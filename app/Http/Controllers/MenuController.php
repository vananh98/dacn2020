<?php

namespace App\Http\Controllers;

use App\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\typeProduct;
use App\cart;
use App\product;


class MenuController extends Controller
{
    //
    public function showMenu()
    {

        return view('page.trangchu');
    }
    //theo danh mục
    public function typeMenu($id)
    {
        $products = product::where('FK_MaLoai', $id)->get();
        $type = typeProduct::find($id);
        return view('page.type', compact('products', 'type'));
    }
    //find product
    public function findProduct(Request $res)
    {
        $type = $res->search_category;
        $name = $res->name;
        $all = $res->all();
        if ($type == "a") {
            $prd = product::where('TenSP', 'like', '%' . $name . '%')->get();
            return view('page.find', compact('prd'));
        } else {
            $prd = product::where([['TenSP', 'like', '%' . $name . '%'], ['FK_MaLoai', $type]])->paginate(10);
            return view('page.find', compact('prd'));
        }
    }
    //type follow brand
    public function typeBrand($id, $id2)
    {
        $brand = brand::find($id);
        $type = typeProduct::find($id2);
        $products = product::where([['FK_MaTH', $id], ['FK_MaLoai', $id2]])->get();
        return view('page.typeFollowBrand', compact('brand', 'type', 'products'));
    }
    //product discount
    public function productDiscount()
    {
        $lists = product::where('KhuyenMai', '>', 0)->paginate(12);
        return view('saller.discount', compact('lists'));
    }
    public function showDetailsBrand($id)
    {
        $brand = brand::find($id);
        $products = product::where('FK_MaTH',$id)->get();
        return view('page.showbrand',compact('brand','products'));
    }
    public function contact(){
        return view('page.contact');
    }
    public function question(){
        return view('page.question');
    }
}
