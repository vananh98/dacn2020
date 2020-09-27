<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;

class CommentsController extends Controller
{
    //
    public function listCMT()
    {
        $list  = comment::where('Trangthai', 'Chưa duyệt')->paginate(10);
        return view('admin.comment.comment', compact('list'));
    }
    public function storeCMT(Request $request)
    {

        $cmt = comment::find($request->id);
        if ($request->stt == "a") {
            return $request->stt;
        } else {
            $cmt->Trangthai = "Duyệt";
            $cmt->save();
            return "oke";
        }
    }
}
