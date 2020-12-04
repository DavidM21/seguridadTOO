<?php

namespace App\Http\Middleware;
use Closure;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RevisarEstado
{
    /**
     * Handle an incoming request.
     *
     * if(Auth::check()){
      * if (Auth::user()->estado != 'Inactivo'){
     *   Auth::user()->estado = 'Activo';
    *}
    *    Auth::user()->estado = 'Activo';
    * }
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {    
        if(Auth::check()){
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
