<?php

namespace App\Http\Controllers\Super;

use App\Ban;
use App\Mail\EmailVerification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\ActivityStatistic;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('super.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function create()
    {
        $roles = Role::all();
        return view('super.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        //dd($request->role);
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cell_phone' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            //'active' => ['required'],
            'blocked' => ['required'],
        ]);

        //Generando un nombre de usuario por defecto
        $username = strtolower( stristr($request->email, "@", true));

        // Generando un contraseña temporal aleatoria
        $temp_password = str_random(12);

        // Creación del nuevo usuarios
        $user = new User;
        $user->username = $username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthday = Date::make($request->birthday);
        $user->email = $request->email;
        $user->cell_phone = $request->cell_phone;
        $user->passcode = Hash::make('0000'); // Passcode por defecto sin defefinir
        $user->password = Hash::make($temp_password);
        $user->temp_password = $temp_password;
        $user->save();

        // Asignando roles
        $user->assignRole($request->role);

        // Creación de tabla Ban para estados del usuarios, activo/inactivo etc
        $ban = new Ban;
        $ban->user_id = $user->id;
        $ban->active = $request->active;
        $ban->active_at = Carbon::now();
        $ban->blocked = $request->blocked;
        $ban->blocked_at = Carbon::now();
        $ban->save();

        // Envio de email para verificación de cuenta
        Mail::to($user->email)->send(new EmailVerification($user, $user->temp_password));
        $user->password = Hash::make($user->temp_password); // cambiar por $temp_password

        // Asignando roles
        $user->assignRole($request->role);
        // Codigo para contar los cambios de roles y asignarlos a la tabla de estadisticas
        $last_activity = ActivityStatistic::all();
        $a = $last_activity->sortByDesc('updated_at')->first();
        //dd($a);

        $all_activities = ActivityStatistic::where('user_id', $user->id)->orderBy('updated_at', 'asc')->get();

        if ($all_activities->count()>0)
        {
            $last_activity = $all_activities->last();
            $activity2 = ActivityStatistic::updateOrCreate([
            'user_id'   => $user->id,
            'number_of_roles'    => count($request->role),
            'number_of_locks'    => $last_activity->number_of_locks,
            'password_changes'    => $last_activity->password_changes,
            'updated_at' => Carbon::now()
            ]);

            $activity2->save();
        }
        else{

            $activity2 = ActivityStatistic::Create([
                'user_id'   =>  $user->id,
                'number_of_roles'    => count($request->role),
                'updated_at' => Carbon::now()
            ]);
            $activity2->save();
        }
        $user->save();

        return redirect()->route('users.index')->with('notification', '¡Nuevo usuario ' .'"'. $user->username .'"'.
            ' guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);
        return view('super.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        $ban = Ban::where('user_id', $id)->get();
        $roles = Role::all();

        return view('super.users.edit', compact('user','roles', 'ban'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        // Buscamos al usuarios a editar
        $user = User::findOrFail($id);
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'string', 'max:255'],
            'cell_phone' => ['required', 'string', 'max:255'],
            'active' => ['required'],
            'blocked' => ['required'],
            'role' => ['required'],
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->email, 'email')
            ],
        ]);

        $last_activity = ActivityStatistic::all();
        $a = $last_activity->sortByDesc('updated_at')->first();
        $all_activities = ActivityStatistic::where('user_id', $user->id)->orderBy('updated_at', 'asc')->get();

        // el if de la linea 222  verifica si ha habido un cambio de roles para realizar el registro en la tabla
        // Estadisticas de actividad

        // Pasando los roles de usuario a un array
        for ($i = 0; $i < count($user->roles); $i++){
            $current_roles[$i] = $user->roles[$i]->id;
        }

        // Comparando array $current_roles con el array de roles del request
        // array_diff(): Devuelve un array que contiene todas las entradas de array1 que no están presentes en ninguna de
        // los otros arrays.
        //Si el array resultante está vacío es porque no hubo cambio en los roles

        // En caso ed quitar roles
        //dd(array_diff($current_roles,$request->role));
        $roles_removed = array_diff($current_roles,$request->role);

        // En caso de agregar roles
        //dd(array_diff($request->role,$current_roles));
        $added_roles = array_diff($request->role,$current_roles);
        //dd(sizeof($removing_roles), sizeof($add_roles));

        // Si al menos hay un elemento en el array es porque se quitó o agrego un nuevo rol,
        // entonces registraremos la modificación del en la tabla ActivityStatistic
        // En caso de no haber modificaciones en los roles del usuario no hará ningún registro
        if( sizeof($roles_removed) > 0 || sizeof($added_roles) > 0) {
            if ($all_activities->count()>0)
            {
                $last_activity = $all_activities->last();
                $activity2 = ActivityStatistic::updateOrCreate([
                    'user_id'   => $id,
                    'number_of_roles'    => count($request->role),
                    'number_of_locks'    => $last_activity->number_of_locks,
                    'password_changes'    => $last_activity->password_changes,
                    'updated_at' => Carbon::now()
                ]);

                $activity2->save();
            }
            else{

                $activity2 = ActivityStatistic::Create([
                    'user_id'   => $id,
                    'number_of_roles'    => count($request->role),
                    'updated_at' => Carbon::now()
                ]);
                $activity2->save();
            }
        }


        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthday = Date::make($request->birthday);
        $user->email = $request->email;
        $user->cell_phone = $request->cell_phone;

        // Reasignando roles
        $user->syncRoles([$request->role]);
        $user->assignRole($request->role);

        // Codigo para contar los cambios de roles y asignarlos a la tabla de estadisticas


        // Creación de estados del usuarios, activo/inactivo etc
        $ban = Ban::where('user_id', $user->id)->first();;
        $ban->active = $request->active;
        $ban->active_at = Carbon::now();
        $ban->blocked = $request->blocked;
        $ban->blocked_at =  Carbon::now();
        $ban->save();



        $user->save();

        return redirect()->route('users.index')->with('notification', '¡Usuario ' .'"'. $user->username .'"'.
            ' actualizado correctamente!');
    }

    public function confirm($id)
    {
        $user = User::findOrFail($id);

        return view('super.users.confirm', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('notification', '¡Usuario ' .'"'. $user->username .'"'. ' eliminado correctamente!');
    }
}
