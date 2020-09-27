<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    //
    public function getListUsers()
    {
        $list = User::paginate(10);
        return view('admin.users.lists', ['list' => $list]);
    }
    public function getUsers($id)
    {
        $iduser = User::find($id);
        return view('admin.users.edit', ['iduser' => $iduser]);
    }
    public function saveUsers(Request $request, $id)
    {
        $user = User::find($id);
        // $user->password=bcrypt($request->password);
        if ($request->changePass == "on") {
            $this->validate($request, [
                'password2' => 'required|min:5|max:32',
                'password3' => 'required|same:password2'
            ], [
                'password2.required' => 'Bạn chưa nhập mật khẩu',
                'password2.min' => 'Mật khẩu phải từ 5 đến 32 kí tự',
                'password2.max' => 'Mật khẩu phải từ 5 đến 32 kí tự',
                'password3.required' => 'Bạn chưa nhập lại mật khẩu',
                'password3.same' => 'Mật khẩu nhập lại chưa chính xác'
            ]);
            $user->Matkhau = bcrypt($request->password2);
        }
        $user->Hoten = $request->name;
        $user->Quyen = $request->quyen;
        $user->save();
        return redirect('admin/users/edit/' . $id)->with('thongbao', 'Đã sữa');
    }
    public function addUsers(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:32',
            'password' => 'required|min:5|max:32',
            'password2' => 'required|same:password',
            'email' => 'required|email|unique:taikhoan,email',
            'level' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'fullname' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên tài khoản',
            'name.min' => 'Tên tài khoản phải từ 5 đến 32 kí tự',
            'name.max' => 'Tên tài khoản phải từ 5 đến 32 kí tự',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải từ 5 đến 32 kí tự',
            'password.max' => 'Mật khẩu phải từ 5 đến 32 kí tự',
            'password2.required' => 'Vui lòng xác nhận lại mật khẩu',
            'password2.same' => 'Nhập lại mật khẩu chưa chính xác',
            'email.required' => 'Vui lòng nhập mail',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'level.required' => 'Chọn quyền tài khoản',
            'address.required' => 'Chưa nhập địa chỉ',
            'fullname.required' => 'Chưa nhập họ tên',
            'phone.required' => 'Nhập số điện thoại'

        ]);
        $user = new User();
        $user->TenTK = $request->name;
        $user->MatKhau = bcrypt($request->password);
        $user->email = $request->email;
        $user->Quyen = $request->level;
        $user->SDT = $request->phone;
        $user->Diachi = $request->address;
        $user->Hoten = $request->fullname;
        $user->save();
        return redirect('admin/users/add')->with('thongbao', 'Đã thêm thành công');
    }
    public function deleteUsers($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/users/lists')->with('thongbao', 'Đã xóa');
    }
    public function listFind(Request $request)
    {
        // return $request->selected." ".$request->name;

        $list = User::where('Hoten', 'like', '%' . $request->name . '%')->paginate(10);
        return view('admin.users.find', ['list' => $list]);
    }
}
