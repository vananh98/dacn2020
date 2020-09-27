<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class staffMiddleware
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
        if (Auth::check()) {
            $user = Auth::User();
            if ($user->Quyen == 3) {
                return $next($request);
            } else {
                return redirect()->Route('staffLogin1')->with('thongbao', 'Sai tài khoản hoặc mật khẩu');
            }
        } else {
            return redirect()->Route('staffLogin1');
        }
    }
}
