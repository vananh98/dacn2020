<?php

namespace App\Http\Controllers;

use App\detailsImport;
use App\importProduct;
use App\order_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\orders;
use App\product;

class SaleController extends Controller
{
    //
    public function index()
    {
        return view('sale.layout2.index2');
    }
    public function login(Request $request)
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
            return redirect()->Route('Saleindex');
        } else {
            //    var_dump($request->account,$request->password);
            return redirect()->Route('saleLogin')->with('thongbao', 'Sai tài khoản hoặc mật khẩu');
        }
    }
    public function getForm($id)
    {
        $iduser = User::find($id);
        return view('sale.edit', compact('iduser'));
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
        $user->Diachi = $request->diachi;
        $user->Hoten = $request->name;
        $user->SDT = $request->sdt;
        $user->save();
        return redirect('sale/editAccount/' . $id)->with('thongbao', 'Đã sữa');
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('saleLogin');
    }
    public function listsOrder()
    {
        $lists = orders::where('Trangthai', 'Duyệt')->orWhere('Trangthai', 'Đã đóng gói')->orWhere('Trangthai', 'Đang giao hàng')->orWhere('Trangthai', 'Đã giao')->orWhere('Trangthai', 'Trả hàng')->paginate(10);
        return view('sale.orders', compact('lists'));
    }
    public function orderDetails($id)
    {
        $dh = orders::find($id);
        $user = User::find($dh->FK_MaKH);
        $order = order_details::where('FK_MaDH', $id)->get();
        return view('sale.detailsorder', compact('order', 'dh', 'user'));
    }
    public function updateOrder(Request $request)
    {
        $idorder = $request->id;
        $stt = $request->stt;
        $order = orders::find($idorder);
        if ($stt == 0) {
            $order->Trangthai = "Đã đóng gói";
        } elseif ($stt == 1) {
            $order->Trangthai = "Đang giao hàng";
        } elseif ($stt == 2) {
            $order->Trangthai = "Giao thành công";
        } else {
            $order->Trangthai = "Thất bại";
        }
        $order->save();
        if ($order->Trangthai == "Thất bại") {
            $back = order_details::where('FK_MaDH', $order->MaDH)->get();
            foreach ($back as $item) {
                $product = product::find($item->Fk_MaSP);
                $product->SoLuong += $item->Soluong;
                $product->save();
            }
        }
        return $order->Trangthai;
    }
    public function orderCancel()
    {
        $lists = orders::where('Trangthai', 'Trả hàng')->paginate(10);
        return view('sale.orderCancel', compact('lists'));
    }
    public function getFormImport()
    {
        $list = product::select('MaSP', 'TenSP')->get();
        return view('sale.form', compact('list'));
    }
    public function postFormImport(Request $req)
    {
        $this->validate($req, [
            'ID' => 'required|unique:phieunhaphang,TenPN'
        ], [
            'ID.required' => 'Chưa nhập tên phiếu nhập',
            'ID.unique' => 'Tên phiếu nhập đã tồn tại'
        ]);
        $user = Auth::user()->MaND;
        $MaPN = $req->ID;
        $import = new importProduct();
        $import->TenPN = $MaPN;
        $import->Fk_MaNN = $user;
        $import->created_at = $req->date;
        $import->save();
        for ($i = 0; $i < count($req->idproduct); $i++) {
            //lấy giá trị từ form gữi lên
            $idProduct = $req->idproduct[$i];
            $qty = $req->quantity[$i];
            //chèn vào bảng chi tiết nhập hàng
            $details =  new detailsImport();
            $details->FK_MaPN = $import->id;
            $details->FK_MaSP = $idProduct;
            $details->SoLuong = $qty;
            $details->save();
            //cập nhật số lượng trong kho
            $product = product::find($idProduct);
            $quantity = $product->SoLuong;
            $product->SoLuong +=   $qty;
            $product->save();
        }
        return redirect()->route('importProduct')->with('thongbao', 'Đã nhập hàng');
    }
}
