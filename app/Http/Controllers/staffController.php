<?php

namespace App\Http\Controllers;

use App\order_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\orders;
use App\product;

class staffController extends Controller
{
    //
    public function Login(Request $request)
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
            return redirect()->Route('staffIndex');
        } else {
            //    var_dump($request->account,$request->password);
            return redirect()->Route('staffLogin1')->with('thongbao', 'Sai tài khoản hoặc mật khẩu');
        }
    }
    public function index()
    {
        return view('staff.layout2.index2');
    }
    public function getForm($id)
    {
        $iduser = User::find($id);
        return view('staff.edit', compact('iduser'));
    }
    public function storeStaff($id, Request $request)
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
        $user->Diachi =$request->diachi;
        $user->Hoten = $request->name;
        $user->SDT = $request->sdt;
        $user->save();
        return redirect('staffshipper/editAccount/' . $id)->with('thongbao', 'Đã sữa');
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('staffLogin1');
    }
    public function listsOrder()
    {
        $lists = orders::where([['FK_MaShipper', Auth::user()->MaND], ['Trangthai', '<>', 'Thất bại']])->where('Trangthai','<>','Giao thành công')->paginate(10);
        return view('staff.orders', compact('lists'));
    }
    public function updateOrder(Request $request)
    {
        $idorder = $request->id;
        $stt = $request->stt;
        $order = orders::find($idorder);
        if ($stt == 0) {
            $order->Trangthai = "Đã giao";
        } else {
            $order->Trangthai = "Trả hàng";
        }
        $order->save();
        // if ($order->Trangthai == "Trả hàng") {
        //     $back = order_details::where('FK_MaDH', $order->MaDH)->get();
        //     foreach ($back as $item) {
        //         $product = product::find($item->Fk_MaSP);
        //         $product->SoLuong += $item->Soluong;
        //         $product->save();
        //     }
        // }
        return $stt;
    }
    public function orderCancel()
    {
        $lists = orders::where([['FK_MaShipper', Auth::user()->MaND], ['Trangthai', 'Trả hàng']])->paginate(10);
        return view('staff.orderCancel', compact('lists'));
    }
    public function orderDetails($id)
    {
        $dh = orders::find($id);
        $user = User::find($dh->FK_MaKH);
        $order = order_details::where('FK_MaDH', $id)->get();
        return view('staff.detailsorder', compact('order', 'dh', 'user'));
    }
}
