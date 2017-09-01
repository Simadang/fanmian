<?php

namespace App\Http\Middleware\Admin;

use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //判断用户是否登录
        if(!session('user')){
            return redirect('admin/login');
        }

        return $next($request);
    }
}
