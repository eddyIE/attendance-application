<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopModel;
use Redirect;

class LopController extends Controller
{
    public function danh_sach_lop()
    {
        //Trả về view có tên danh-sach-lop
        $list = LopModel::danh_sach_lop();
        return view('other.danh-sach-lop', compact('list'));
    }
    public function them_lop()
    {
        return view('other.them-lop');
    }
    public function them_lop_xu_ly(Request $request)
    {
        $lop = new LopModel;
        $lop->ten_lop = $request->ten_lop;
        $lop->them_lop_xu_ly();
        return Redirect::route("other.danh_sach_lop");
    }
    public function sua_lop(Request $request)
    {
        $id = $request->id;
        $lop = LopModel::sua_lop($id);
        return view('other.sua-lop', compact('lop'));
    }
    public function sua_lop_xu_ly(Request $request)
    {
        $lop = new LopModel();
        $lop->id = $request->id;
        $lop->ten_lop = $request->ten_lop;
        $lop->sua_lop_xu_ly();
        return Redirect::route("other.danh_sach_lop");
    }
    public function xoa_lop(Request $request)
    {
        $lop = new LopModel();
        $lop->id = $request->id;
        $lop->xoa_lop();
        return Redirect::route("other.danh_sach_lop");
    }
}