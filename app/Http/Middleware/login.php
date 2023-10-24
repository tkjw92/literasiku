<?php

namespace App\Http\Middleware;

use App\Models\UserModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $mode = null): Response
    {
        if ($mode == null) {
            if (session()->has('cred')) {
                $user = UserModel::where('username', session('cred')['username'])->first();
                if ($user->verify == 'activated') {
                    return $next($request);
                } else {
                    return redirect('/verify');
                }
            } else {
                return redirect('/login');
            }
        }
        if ($mode == 'islogin') {
            if (session()->has('cred')) {
                if (session('cred')['username'] == 'admin') {
                    return redirect('/admin');
                } else {
                    return redirect('/');
                }
            } else {
                return $next($request);
            }
        } else {
            if (session()->has('cred')) {
                if (session('cred')['username'] == 'admin') {
                    return $next($request);
                } else {
                    return redirect('/');
                }
            } else {
                return redirect('/login');
            }
        }
    }
}
