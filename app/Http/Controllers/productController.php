<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\typeProduct;
use App\brand;
use App\product;
use Illuminate\Http\UploadedFile;

class productController extends Controller
{
    //return list product
    public function getListProducts()
    {
        $lists = product::paginate(10);
        $typeProduct = typeProduct::all();
        $brand = brand::all();
        return view('admin.products.lists', \compact('lists', 'typeProduct', 'brand'));
    }
    //edit product
    public function getProduct($id)
    {
        $product = product::find($id);
        $typeProduct = typeProduct::all();
        $brand = brand::all();
        return view('admin.products.edit', \compact('product', 'typeProduct', 'brand'));
    }
    public function saveProduct($id, Request $request)
    {
        $product = product::find($id);
        $img = $request->img;

        if ($img) {
            $detailImg = 'img/' . $product->Hinh;
            if (file_exists($detailImg)) {
                unlink($detailImg);
            }
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $picture = Str::random(3) . "_" . $name;
            while (file_exists("img/" . $picture)) {
                $picture = Str::random(3) . "_" . $name;
            }
            $file->move("img/", $picture);
            $product->TenSP = $request->name;
            $product->Gia = $request->price;
            $product->FK_MaLoai = $request->selectType;
            $product->FK_MaTH = $request->selectBrand;
            $product->Noibat = $request->changeHighlight;
            $product->KhuyenMai = $request->discount;
            $product->Hinh = $picture;
        } else {
            $product->TenSP = $request->name;
            $product->Gia = $request->price;
            $product->FK_MaLoai = $request->selectType;
            $product->FK_MaTH = $request->selectBrand;
            $product->Noibat = $request->changeHighlight;
            $product->KhuyenMai = $request->discount;
        }
        $product->save();
        return redirect('admin/products/edit/' . $id)->with('thongbao', 'Đã sữa');
    }
    //add product
    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|min:1',

            'img' => 'required'
        ], [
            'name.required' => 'Nhập tên sản phẩm',
            'price.required' => 'Nhập giá ',
            'price.min' => 'Số tiền phải lướng hơn 0',

            'img.required' => 'chọn hình cho sản phẩm'

        ]);
        // $img=$request->file('img');
        // $nameImg= $img->getClientOriginalName($request->img);
        // $request->file('img')->move('img',$nameImg);
        $product = new product();
        $product->TenSP = $request->name;
        $product->Gia = $request->price;
        $product->KhuyenMai = $request->discount;
        $product->Soluong = 0;
        $product->Noibat = $request->selectHighlight;
        $product->FK_MaTH = $request->selectBrand;
        $product->FK_MaLoai = $request->selectType;
        $product->Mota = $request->des;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $picture = Str::random(3) . "_" . $name;
            while (file_exists("img/" . $picture)) {
                $picture = Str::random(3) . "_" . $name;
            }
            $file->move("img/", $picture);
            $product->Hinh = $picture;
        }
        $product->save();
        return redirect()->Route('getTypeProduct')->with('thongbao', 'Đã Thêm');
    }

    public function getTypeProduct()
    {
        $product = typeProduct::all();
        $brand = brand::all();
        return view('admin.products.add', compact('product', 'brand'));
    }
    //delete product
    public function deleteProduct($id)
    {

        $product = product::find($id);
        $img = $product->Hinh;
        $path = 'img/' . $img;
        if (file_exists($path)) {
            unlink($path);
        }
        $product->delete();
        return \redirect()->Route('getProduct')->with('thongbao', 'Đã xóa');
    }
}
