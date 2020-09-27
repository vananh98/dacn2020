<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddelware
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
        if(Auth::check())
        {
            $user = Auth::User();
            if($user->Quyen==0){
                return $next($request);
            }else{
                return redirect()->Route('adminlogin')->with('thongbao','Không phải tài khoản admin');
            }            
        }else{
            return redirect()->Route('adminlogin');
        }
        
    }
}
