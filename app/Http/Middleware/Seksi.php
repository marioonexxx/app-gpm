<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Seksi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }        

        $userRole = Auth::user()->role;
        
        // role administrator
        if($userRole == 0)
        {
            return redirect()->route('administrator.dashboard');
        }
        // role seksi
        if($userRole == 1)
        {
            return $next($request);
        }
        // role subseksi
        if($userRole == 2)
        {
            return redirect()->route('subseksi.dashboard');
        }
        //role keuangan
        if($userRole == 3)
        {
            return redirect()->route('keuangan.dashboard');
        }
        //role litbang
        if($userRole == 4)
        {
            return redirect()->route('litbang.dashboard');
        }
        //role sekretaris
        if($userRole == 5)
        {
            return redirect()->route('sekretaris.dashboard');
        }
    }
}
