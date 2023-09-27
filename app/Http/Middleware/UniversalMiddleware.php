<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UniversalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if (Auth::check()) {
            if (in_array(Auth::user()->roll, ['admin', 'teacher', 'student'])) {
                return $next($request);
            }else{
                return redirect('/profile')->with('message', "Sizda bu sahifaga kirish uchun ruxsat yo'q!");
            }
           
        } else {
            return redirect('/login')->with('message', "Siz saytga kirmagansiz!");
        }

    }
}
