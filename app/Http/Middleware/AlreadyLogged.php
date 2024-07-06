<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlreadyLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('adminId') && (url('connexionadmin')==$request->url() || url('/')==$request->url())){
            return redirect('/profileadmin');
        }
        return $next($request);
    }
}
