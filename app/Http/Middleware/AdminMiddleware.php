<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {        
       
        if (Auth::check()) {
            if (Auth::user()->roll === 'admin') {
                return $next($request);
            }else{
                return redirect('/profile')->with('message', "Sizda bu sahifaga kirish uchun ruxsat yo'q!");
            }
           
        } else {
            return redirect('/login')->with('message', "Siz saytga kirmagansiz!");
        }

        // return $next($request);
    }
}
