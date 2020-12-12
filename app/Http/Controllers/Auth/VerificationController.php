<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\Rules\especial;
use App\Rules\mayuscula;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;




class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function resendEmail(int $id)
    {
        $temp_password = str_random(16);

        $user = User::findOrFail($id);
        $user->password = Hash::make($temp_password);
        $user->temp_password = $temp_password;
        $user->save();

        Mail::to($user->email)->send(new EmailVerification($user, $user->temp_password));

        return view('auth.verify', compact('user'));
    }


    protected function changeTempPassword(int $id)
    {
        $user = User::findOrFail($id);
        return view('auth.passwords.TempPassword', compact('user'));
    }

    protected function changeTempPasswordPost(Request $request, int $id)
    {
        // Checking current password
        $request->validate([
            'email' => 'required|email|exists:users,email|string|max:255',
            'temp_password' => 'required|string|max:255',
            'new_password' => ['required', 'string', 'min:12', 'max:255',new especial, new mayuscula, 'confirmed'],
        ]);

        $user = User::findORfail($id);

        // Comprobanndo si la contraseña provisional no se ha cambiado la primera vez
        if (Hash::check($user->temp_password,$user->password)) {
            // Comprobando si la contraseña provisional del form coincide con la contraseña provisional actual
            if (Hash::check($request->temp_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->route('login')->with('alert-success', '¡Contraseña provisional actualizada con éxito!');
            }
        }else{
            return redirect()->back()->withErrors(['email'=> 'La contraseña provisional ya fue cambiada la primera vez.']);
        }

        //dd('no coinciden');
        return redirect()->back()->withErrors(['email'=> 'Estas credenciales no coinciden con nuestros registros.']);
    }
}
