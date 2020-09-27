<?php

namespace App\Http\Controllers;

use App\detailsImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\product;
use App\orders;
use App\User;
use App\importProduct;

class importController extends Controller
{
    //show list import
    public function getList(){
        $list = importProduct::all();
        return view('admin.import.list',compact('list'));
    }
    //get form import
    public function getForm()
    {
        $list = product::select('MaSP', 'TenSP')->get();
        return view('admin.import.form', compact('list'));
    }
    //store product
    public function postForm(Request $req)
    {
        $this->validate($req, [
            'ID' => 'required|unique:phieunhaphang,MaPN'
        ], [
            'ID.required' => 'Chưa nhập tên phiếu nhập',
            'ID.unique'=>'tên phiếu nhập đã tồn tại'
        ]);
        $user = Auth::user()->MaND;
        $MaPN = $req->ID;
        $import = new importProduct();
        $import->TenPN = $MaPN;
        $import->Fk_MaNN = $user;
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
    //details import
    public function detailsImport($id){
        $lists  = detailsImport::where('FK_MaPN',$id)->get();
        return view('admin.import.details',compact('lists','id'));
    }
}
