<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use Laravel\Ui\Presets\React;

class BrandController extends Controller
{
    //
    public function listBrand()
    {
        $list = brand::all();
        return \view('admin.brand.list', compact('list'));
    }
    public function getForm()
    {
        return view('admin.brand.add');
    }
    public function addBrand(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:danhmuc,TenLoai'
        ], [
            'name.required' => 'Nhập tên danh mục',
            'name.unique' => 'Danh mục đã tồn tại'
        ]);
        $brand = new brand();
        $brand->TenTH = $request->name;
        $brand->save();
        return redirect()->route('formAddBrand')->with('thongbao', 'Đã thêm');
    }
    public function editBrand($id)
    {
        $brand = brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }
    public function storeBrand($id, Request $req)
    {
        $brand = brand::find($id);
        $brand->TenTH = $req->name;
        $brand->save();
        return redirect('admin/brands/edit/' . $id)->with('thongbao', 'Đã cập nhật');
    }
    public function remove(Request $req)
    {
        $brand = brand::find($req->id);
        $brand->delete();
        return $req->id;
    }
    public function deleteOrder()
    {
    }
}
