<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use http\Env\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;

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

    protected function changeTempPassword()
    {
        // Checking current password


        return view('auth.passwords.TempPassword');
    }
}
