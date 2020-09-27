<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\typeProduct;

class typeController extends Controller
{
    //
    //show list type
    public function listType()
    {
        $type = typeProduct::paginate(10);
        return view('admin.type.lists', compact('type'));
    }
    //get form add
    public function getType()
    {
        return view('admin.type.add');
    }
    //add Type
    public function addType(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:danhmuc,TenLoai'
        ], [
            'name.required' => 'Nhập tên danh mục',
            'name.unique' => 'Danh mục đã tồn tại'
        ]);
        $type = new typeProduct();
        $type->TenLoai = $request->name;
        $type->save();
        return redirect()->route('getType')->with('thongbao', 'Đã thêm');
    }
    public function remove(Request $req)
    {
        $type = typeProduct::find($req->id);
        $type->delete();
        return $req->id;
    }
    public function editType($id)
    {
        $type = typeProduct::find($id);
        return view('admin.type.edit', compact('type'));
    }
    public function storeType($id, Request $req)
    {
        $type = typeProduct::find($id);
        $type->TenLoai = $req->name;
        $type->save();
        return redirect('admin/type/edit/'.$id)->with('thongbao','Đã cập nhật');
    }
}
