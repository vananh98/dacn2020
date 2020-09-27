<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\cart;
use App\order_details;
use App\User;
use App\product;
use App\orders;
use App\Gift;
use App\comment;
use Illuminate\Http\Request;

class clientController extends Controller
{
    //
    public function details_product($id)
    {
        $product = product::find($id);
        $lists = product::where('FK_MaLoai', $product->FK_MaLoai)->get();
        return view('page.simple_product', \compact('product', 'lists'));
    }
    //page infor
    public function information()
    {
        return view('page.information');
    }
    //login
    public function login(Request $req)
    {
        $validator = $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['TenTK' => $validator['username'], 'password' => $validator['password']])) {
            return \redirect()->route('infor');
        } else {
            return \redirect()->Route('login')->with('thongbao', 'Sai mật khẩu hoặc mật khẩu');
        }
    }
    //get form regis
    public function regis()
    {
        return redirect()->route('login');
    }
    //regis
    public function regis2(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:32',
            'password' => 'required|min:5|max:32',
            'password2' => 'required|same:password',
            'email' => 'required|email|unique:taikhoan,email',
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
            'address.required' => 'Chưa nhập địa chỉ',
            'fullname.required' => 'Chưa nhập họ tên'

        ]);
        $user = new User();
        $user->TenTK = $request->name;
        $user->Matkhau = bcrypt($request->password);
        $user->email = $request->email;
        $user->Quyen = 1;
        $user->SDT = $request->phone;
        $user->Diachi = $request->address;
        $user->Hoten = $request->fullname;
        $user->save();
        return redirect()->route('login')->with('thongbao2', 'Đã đăng kí thành công');
    }

    //thoat
    public function logout()
    {
        Auth::logout();
        return \redirect()->Route('trangchu');
    }
    public function account()
    {
        $user = Auth::user();

        return view('page.myaccount', compact('user'));
    }
    //list order
    public function getOrders()
    {
        $user = Auth::user()->MaND;
        $list = orders::where([['FK_MaKH', $user], ['Trangthai', '<>', 'Hủy']])->where('Trangthai', '<>', 'Trả hàng')->where([['Trangthai', '<>', 'Thất bại']])->where([['Trangthai', '<>', 'Chưa đặt']])->paginate(10);
        return view('page.orders', compact('list'));
    }
    //list orderCanceled
    public function ordercanceled()
    {
        $user = Auth::user()->MaND;
        $lists = orders::where([['FK_MaKH', $user], ['Trangthai', 'Hủy']])->paginate(10);
        return view('page.cancel_order', compact('lists'));
    }
    //update Account
    public function update($id, Request $req)
    {
        if ($req->password_1 != "") {
            $validator = $req->validate([
                'password_1' => 'min:6|max:32',
                'password_2' => 'same:password_1'
            ], [
                'password_1.min' => 'Độ dài mật khẩu từ 6 đến 32 kí tự',
                'password_1.max' => 'Độ dài mật khẩu từ 6 đến 32 kí tự',
                'password_2.same' => 'Xác thực mật khẩu sai',

            ]);
            $user = User::find($id);
            $user->Hoten = $req->account_fullname;
            $user->SDT = $req->account_tel;
            $user->Diachi = $req->account_address;
            $user->Matkhau = bcrypt($req->password_2);
            $user->save();
            return redirect()->route('account')->with('thongbao', 'Đã cập nhật');
        } else {
            $user = User::find($id);
            $user->Hoten = $req->account_fullname;
            $user->SDT = $req->account_tel;
            $user->Diachi = $req->account_address;
            $user->save();
            return redirect()->route('account')->with('thongbao', 'Đã cập nhật');
        }
    }
    //cancel order by ajax
    public function cancel_order(Request $req)
    {
        $iddh = $req->id;
        $order = orders::find($iddh);
        $order->Trangthai = "Hủy";
        $order->save();
        $details_order = order_details::where('FK_MaDH', $iddh)->get();
        foreach ($details_order as $item) {
            $idproduct = $item->Fk_MaSP;
            $qti = $item->Soluong;
            $product = product::find($idproduct);
            $product->SoLuong += $qti;
            $product->save();
        }
        return $order->Trangthai;
    }
    //details Order
    public function detailsOrder($id)
    {
        $order = orders::find($id);
        $user = User::find($order->FK_MaKH);
        $details = order_details::where('FK_MaDH', $order->MaDH)->get();
        return view('page.order_details', compact('order', 'details', 'user'));
    }
    public function formGift($id)
    {
        return view('page.formGift', compact('id'));
    }
    public function giftConfirm(Request $req, $id)
    {
        $name = $req->customer;
        $address = $req->address;
        $phone = $req->phone;
        $user = Auth::user();
        $order = orders::where('FK_MaKH', $user->MaND)->where('Trangthai', 'Chưa đặt')->first();
        $cart = order_details::where('FK_MaDH', $order->MaDH)->get();
        //add details order
        foreach ($cart as $item) {
            // $detail = new order_details();
            // $detail->FK_MaDH = $id_order;
            // $detail->Fk_MaSP = $item->FK_MaSP;
            // $detail->Soluong = $item->Soluong;
            //get price of product
            $product = product::find($item->Fk_MaSP);
            $product->SoLuong -= $item->Soluong;
            $product->save();
            $price = $product->Gia - ($product->Gia / 100 * $product->KhuyenMai);

            //delete cart when confirm

        }
        $order->Trangthai = "Đang xử lí";
        $order->GuiTang = 1;
        $order->save();
        $gift1 = $order->GuiTang;
        $id_order = $order->MaDH;
        $gift = new Gift();
        $gift->TenNguoiNhan = $name;
        $gift->SDT = $phone;
        $gift->DiaChi = $address;
        $gift->FK_MaDH = $id;
        $gift->save();
        $sum = $order->Tong;
        $customer = $name;
        $details = order_details::where('FK_MaDH', $order->MaDH)->get();
        return view('page.confirmGift', compact('details', 'customer', 'phone', 'sum', 'address', 'gift1'));
    }
    public function comments($id, Request $req)
    {
        if (Auth::check()) {
            $user = Auth::user()->MaND;
            $cmt = new comment();
            $cmt->Fk_MaKH = $user;
            $cmt->FK_MaSP = $id;
            $cmt->Noidung = $req->comment;
            $cmt->Trangthai = "Chưa duyệt";
            $cmt->save();
            return redirect()->route('simple_product', ['id' => $id])->with('nhanxet', 'Nhận xét đã được gữi');
        } else {
            return redirect()->route('login');
        }
    }
}
