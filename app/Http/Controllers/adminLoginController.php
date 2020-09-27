<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class adminLoginController extends Controller
{
    //
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'account' => 'required',
            'password' => 'required'
            // 'password' => 'required'
        ], [
            'account.required' => 'Vui lòng nhập tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu'
            // 'password.required' => 'Vui lòng nhập mật khẩu'
        ]);
        //pass trong DB phải được mã hóa trước
        if (Auth::attempt(['TenTK' => $request->account, 'password' => $request->password])) {
            return redirect()->Route('IndexAdmin');
        } else {
            //    var_dump($request->account,$request->password);
            return redirect()->Route('adminlogin')->with('thongbao', 'Sai tài khoản hoặc mật khẩu');
        }
    }
    public function admidLogout()
    {
        Auth::logout();
        return redirect()->Route('adminlogin');
    }
}
