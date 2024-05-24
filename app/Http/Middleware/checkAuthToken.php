<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class checkAuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::get('auth_token'))
        {
           $data =  \DB::table('royal_app_tokens')->where('token_key',Session::get('auth_token'))->first();
           if($data)
           {
              return $next($request);
           }
           else
           {
             return redirect('/');
           }
        }
        else
        {
             return redirect('/');
        }
        
    }
}
