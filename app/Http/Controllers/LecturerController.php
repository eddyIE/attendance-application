<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LecturerModel;

class LecturerController extends Controller
{
    public function LecturerList() {
        $list = LecturerModel::LecturerList();
        return view('lecturer',compact('list'));
    }
}
