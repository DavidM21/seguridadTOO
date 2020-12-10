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
use Carbon\Carbon;

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
            'active' => ['required'],
            'blocked' => ['required'],
        ]);

        //Generando un nombre de usuario por defecto
        $username = strtolower( stristr($request->email, "@", true));

        // Generando un contraseña temporal aleatoria
        $temp_password = str_random(12);

        $user = new User;
        $user->username = $username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthday = Date::make($request->birthday);
        $user->email = $request->email;
        $user->cell_phone = $request->cell_phone;
        $user->passcode = Hash::make('0000');
        $user->password = Hash::make($temp_password);
        $user->temp_password = $temp_password;
        $user->save();

        // Asignando roles
        $user->assignRole($request->role);

        // Creación de estados del usuarios, activo/inactivo etc
        $ban = new Ban;
        $ban->user_id = $user->id;
        $ban->active = $request->active;
        $ban->active_at = Carbon::now();
        $ban->blocked = $request->blocked;
        $ban->blocked_at = Carbon::now();
        $ban->save();

        // Envio de email para verificación de cuenta
        Mail::to($user->email)->send(new EmailVerification($user, $user->temp_password));

        return redirect()->route('users.index')->with('notification', '¡Nuevo usuario ' .'"'. $user->username .'"'.
            ' guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
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
    public function edit($id)
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
        $user = User::findOrFail($id);
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'string', 'max:255'],
            'cell_phone' => ['required', 'string', 'max:255'],
            //'role' => ['required'],
            'active' => ['required'],
            'blocked' => ['required'],
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->email, 'email')
            ],
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthday = Date::make($request->birthday);
        $user->email = $request->email;
        $user->cell_phone = $request->cell_phone;
        $user->save();

        // Reasignando roles
        $user->syncRoles([$request->role]);

        // Creación de estados del usuarios, activo/inactivo etc
        $ban = Ban::where('user_id', $user->id)->first();;
        $ban->active = $request->active;
        $ban->active_at = Carbon::now();
        $ban->blocked = $request->blocked;
        $ban->blocked_at =  Carbon::now();
        $ban->save();

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
