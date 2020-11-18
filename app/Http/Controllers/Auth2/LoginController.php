<?php

namespace App\Http\Controllers\Auth2;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/home'; // Una vez hacemos login nos direcciona aquí


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth2.login');
    }


    public function username()
    {
        return 'email';
    }

    // Aquí
    protected function authenticated(Request $request, $user)
    {
        //
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/auth/login');
    }



}
