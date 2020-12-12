<?php

namespace App\Http\Controllers\Auth;

use App\Ask;
use App\Ban;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Mail\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\especial;
use App\Rules\mayuscula;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cell_phone' => ['required', 'string', 'max:255'],
            'passcode' => ['required', 'digits:4'],
            'question_one' => ['required'],
            'answer_one' => ['required', 'string', 'max:255'],
            'question_two' => ['required'],
            'answer_two' => ['required', 'string', 'max:255'],
            'question_three' => ['required'],
            'answer_three' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:11',new especial, new mayuscula]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function index()
    {
        $asks = Ask::all();
        //dd($asks);
        return view('auth.register', compact('asks'));
    }

    public function  verify()
    {
        return view('auth.verify');
    }

    protected function register(Request $request)
    {
         $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'string', 'max:255','date_format:Y-m-d'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cell_phone' => ['required', 'string', 'max:255'],
            'passcode' => ['required', 'digits:4'],
            'question_one' => ['required'],
            'answer_one' => ['required', 'string', 'max:255'],
            'question_two' => ['required'],
            'answer_two' => ['required', 'string', 'max:255'],
            'question_three' => ['required'],
            'answer_three' => ['required', 'string', 'max:255'],
        ]);

        //Generando un nombre de usuario por defecto
        $username = strtolower(stristr($request->email, "@", true));

        // Generando un contraseña temporal aleatoria
        $temp_password = str_random(16);

        // Creación del usuario
        $user = new User;
        $user->username = $username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthday = Date::make($request->birthday);
        $user->email = $request->email;
        $user->cell_phone = $request->cell_phone;
        $user->passcode = Hash::make($request->passcode);
        $user->password = Hash::make($temp_password);
        $user->temp_password = $temp_password;
        //$user->password = Hash::make('prueba123admin'); // cambiar por $temp_password
        $user->estado = 'Inactivo';
        $user->save();

        // Asginando preguntas al usuario
        $user->asks()->attach($request->question_one, ['anwer'=>Hash::make($request->answer_one)]);
        $user->asks()->attach($request->question_two, ['anwer'=>Hash::make($request->answer_two)]);
        $user->asks()->attach($request->question_three, ['anwer'=>Hash::make($request->answer_three)]);

        $ban = new Ban;
        $ban->user_id = $user->id;
        $ban->save();

        // Envio de email para verificación de cuenta
        Mail::to($user->email)->send(new EmailVerification($user, $user->temp_password));
       return view('auth.verify', compact('user'));
    }
}
