<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\PasswordExpiredRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class ExpiredPasswordController extends Controller
{
    public function expired()
    {
        return view('auth.passwords.expired');
    }
    
    public function postExpired(PasswordExpiredRequest $request)
    {
        // Checking current password
        if (!Hash::check($request->current_password, $request->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Contraseña actual no es correcta']);
        }

        $request->user()->update([
            'password' => Hash::make($request->password),
            'password_changed_at' => Carbon::now()->toDateTimeString(),
        ]);
        $request->user()->increment('cantidad_cambios_contra');
        return redirect()->back()->with(['status' => 'Contraseña actualizada correctamente']);
    }
}