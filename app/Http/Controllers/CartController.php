<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\product;
use App\cart;
use App\order_details;
use App\orders;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //thêm vào giỏ hàng
    public function addCart(Request $req)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $oldcart1 = orders::where([['FK_MaKH', $user->MaND], ['Trangthai', 'Chưa đặt']])->first();
            if ($oldcart1) {
                $oldcart = order_details::where([['FK_MaDH', $oldcart1->MaDH], ['Fk_MaSP', $req->id]])->first();
                if ($oldcart) {
                    $oldcart->Soluong += $req->quantity;
                    $product = product::find($req->id);
                    $price = ($product->Gia) - ($product->Gia / 100 * $product->KhuyenMai);
                    $oldcart->Gia = $price;
                    $oldcart->Tong = $price * $oldcart->Soluong;
                    $oldcart->save();
                } else {
                    $newDetailsCart = new order_details();
                    $newDetailsCart->Fk_MaSP = $req->id;
                    $newDetailsCart->Soluong += $req->quantity;
                    $newDetailsCart->FK_MaDH = $oldcart1->MaDH;
                    $product = product::find($req->id);
                    $price = ($product->Gia) - ($product->Gia / 100 * $product->KhuyenMai);
                    $newDetailsCart->Gia = $price;
                    $newDetailsCart->Tong = $price * $req->quantity;
                    $newDetailsCart->save();
                }
                $tong  = order_details::where('FK_MaDH', $oldcart1->MaDH)->get()->sum('Tong');
                $oldcart1->Tong = $tong;
                $oldcart1->save();
            } else {
                $newcart = new orders();
                $newcart->FK_MaKH = $user->MaND;
                $newcart->Trangthai = 'Chưa đặt';
                $product = product::find($req->id);
                $price = ($product->Gia) - ($product->Gia / 100 * $product->KhuyenMai);
                $newcart->Tong = $price;
                $newcart->save();
                $newDetailsCart = new order_details();
                $newDetailsCart->Fk_MaSP = $req->id;
                $newDetailsCart->Soluong += $req->quantity;
                $newDetailsCart->FK_MaDH = $newcart->MaDH;
                $product = product::find($req->id);
                $price = ($product->Gia) - ($product->Gia / 100 * $product->KhuyenMai);
                $newDetailsCart->Gia = $price;
                $newDetailsCart->Tong = $price * $req->quantity;
                $newDetailsCart->save();
            }
        }
        return \redirect()->route('getCart');
    }
    public function getCart()
    {
        $user = Auth::user();
        $cart1 = orders::where([['FK_MaKH', $user->MaND], ['Trangthai', 'Chưa đặt']])->first();
        if ($cart1)
            $cart = order_details::where('FK_MaDH', $cart1->MaDH)->get();
        else
            $cart = 0;
        return view('page.cart', \compact('cart'));
    }
    //addlive
    public function addlive(Request $req)
    {
        return $req->id;
    }
    //ajax 
    public function store(Request $req)
    {
        //change sum money of product
        $sum = 0;
        $user = Auth::user();
        $id = $req->id;
        $qty = $req->qty;
        $product = order_details::find($id);
        $product->Soluong = $qty;
        $product->Tong = $product->Soluong * $product->Gia;
        $product->save();
        $idOrder = $product->FK_MaDH;
        $pr = product::find($product->Fk_MaSP);
        $price = ($pr->Gia) - ($pr->Gia / 100 * ($pr->KhuyenMai));
        // $product->Soluong = $qty;
        $price = number_format($price * $qty);
        // $product->save();
        //change total money in cart of user
        $carts = order_details::where('FK_MaDH', $product->FK_MaDH)->get();
        foreach ($carts as $cart) {
            $product = product::find($cart->Fk_MaSP);
            $price2 = ($product->Gia) - ($product->Gia / 100 * ($product->KhuyenMai));
            $price2 = $price2 * ($cart->Soluong);
            $sum += $price2;
        }

        $order = orders::find($idOrder);
        $order->Tong = $sum;
        $order->save();
        $count = $carts->count();

        $json = ["price" => $price, "total" => number_format($sum), "count" => $count];

        return response()->json($json);
        // return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }
    //remove products in cart
    public function remove(Request $req)
    {
        $sum = 0;
        $user = Auth::user();
        $id = $req->id;
        $product = order_details::find($id);
        $product->delete();
        $idOrder = $product->FK_MaDH;
        $carts = order_details::where('FK_MaDH', $idOrder)->get();
        foreach ($carts as $cart) {
            $product = product::find($cart->Fk_MaSP);
            $price2 = ($product->Gia) - ($product->Gia / 100 * ($product->KhuyenMai));
            $price2 = $price2 * ($cart->Soluong);
            $sum += $price2;
        }
        $count = $carts->count();
        $order = orders::find($idOrder);
        if ($count == 0) {
            $order->delete();
        } else {
            $order->Tong = $sum;
            $order->save();
        }
        $json = ["total" => number_format($sum), "count" => $count];
        return response()->json($json);
    }
    //add quantity in cart
    public function addlive1(Request $req)
    {
        
        if (Auth::check()) {
            $user = Auth::user();
            $oldcart1 = orders::where([['FK_MaKH', $user->MaND], ['Trangthai', 'Chưa đặt']])->first();
            if ($oldcart1) {
                $oldcart = order_details::where([['FK_MaDH', $oldcart1->MaDH], ['Fk_MaSP', $req->id]])->first();
                if ($oldcart) {
                    $oldcart->Soluong += 1;
                    $product = product::find($req->id);
                    $price = ($product->Gia) - ($product->Gia / 100 * $product->KhuyenMai);
                    $oldcart->Gia = $price;
                    $oldcart->Tong = $price * $oldcart->Soluong;
                    $oldcart->save();
                    $count = order_details::where('FK_MaDH', $oldcart1->MaDH)->count();
                    $tong  = order_details::where('FK_MaDH', $oldcart1->MaDH)->get()->sum('Tong');
                    $oldcart1->Tong = $tong;
                    $oldcart1->save();
                    return $count;
                } else {
                    $newDetailsCart = new order_details();
                    $newDetailsCart->Fk_MaSP = $req->id;
                    $newDetailsCart->Soluong += 1;
                    $newDetailsCart->FK_MaDH = $oldcart1->MaDH;
                    $product = product::find($req->id);
                    $price = ($product->Gia) - ($product->Gia / 100 * $product->KhuyenMai);
                    $newDetailsCart->Gia = $price;
                    $newDetailsCart->Tong = $price * $newDetailsCart->Soluong;
                    $newDetailsCart->save();
                    $count = order_details::where('Fk_MaDH', $oldcart1->MaDH)->count();
                    $tong  = order_details::where('FK_MaDH', $oldcart1->MaDH)->get()->sum('Tong');
                    $oldcart1->Tong = $tong;
                    $oldcart1->save();
                    return $count;
                }
            } else {
                $newcart = new orders();
                $newcart->FK_MaKH = $user->MaND;
                $newcart->Trangthai = 'Chưa đặt';
                $product = product::find($req->id);
                $price = ($product->Gia) - ($product->Gia / 100 * $product->KhuyenMai);
                $newcart->Tong = $price;
                $newcart->save();
                $newDetailsCart = new order_details();
                $newDetailsCart->Fk_MaSP = $req->id;
                $newDetailsCart->Soluong += 1;
                $newDetailsCart->FK_MaDH = $newcart->MaDH;
                $product = product::find($req->id);
                $price = ($product->Gia) - ($product->Gia / 100 * $product->KhuyenMai);
                $newDetailsCart->Gia = $price;
                $newDetailsCart->Tong = $price * $newDetailsCart->Soluong;
                $newDetailsCart->save();
                $count = order_details::where('FK_MaDH', $newcart->MaDH)->count();
                return $count;
            }
        } else {
            return "false";
        }
    }
    //checkout
    public function checkout()
    {
        $user = Auth::user();
        $carts1 = orders::where('FK_MaKH', $user->MaND)->where('Trangthai', 'Chưa đặt')->first();
        $idorder = $carts1->MaDH;
        // dd($carts1);
        $carts = order_details::where('FK_MaDH', $carts1->MaDH)->get();

        return view('page.checkout', compact('user', 'carts', 'idorder'));
    }
    //confirm
    public function confirm(Request $req)
    {
        $user = Auth::user();
        $order = orders::where('FK_MaKH', $user->MaND)->where('Trangthai', 'Chưa đặt')->first();
        $cart = order_details::where('FK_MaDH', $order->MaDH)->get();
        //add details order
        foreach ($cart as $item) {
            $product = product::find($item->Fk_MaSP);
            $product->SoLuong -= $item->Soluong;
            $product->save();
            $price = $product->Gia - ($product->Gia / 100 * $product->KhuyenMai);
        }
        $customer = $req->billing_first_name;
        $phone = $req->billing_phone;
        $address = $req->billing_address_1;
        $sum = $req->sum;
        $des = $req->order_comments;
        $order->Trangthai = "Đang xử lí";
        $order->GuiTang = 0;
        $order->save();
        $id_order = $order->MaDH;
        $details = order_details::where('Fk_MaDH', $id_order)->get();

        return view('page.confirm', compact('details', 'user', 'sum', 'des', 'customer', 'phone', 'address', 'id_order'));
    }
}
