<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\orders;
use App\order_details;
use App\User;

class OrdersController extends Controller
{
    //
    public function listOrder()
    {
        $lists = orders::where('Trangthai','Đang xử lí')->paginate(10);
        // dd($lists);
        return view('admin.orders.list', compact('lists'));
    }
    public function editOrder()
    {
    }
    public function storeOrder()
    {
    }
    public function deleteOrder()
    {
    }
    public function detailsOrder($id)
    {

        $dh = orders::find($id);
        $user = User::find($dh->FK_MaKH);
        $order = order_details::where('FK_MaDH', $id)->get();
        return view('admin.orders.detailsorder', compact('order', 'dh', 'user'));
    }
    //update = ajax
    public function updateOrder(Request $request)
    {
        
        $idorder = $request->id;
        $stt = $request->stt;
        $order = orders::find($idorder);
        $order->FK_MaShipper = $stt;
        $order->Trangthai = "Duyệt";
        $order->save();

        return ($stt);
    }
    public function orderCancel()
    {
        $lists = orders::where('Trangthai', 'Trả hàng')->paginate(10);
        // dd($lists);
        return view('admin.orders.orderCancel', compact('lists'));
    }
}
