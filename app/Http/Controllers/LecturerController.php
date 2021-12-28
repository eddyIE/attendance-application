<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;

class LecturerController extends Controller
{
    public function LecturerList() {
        $list = Lecturer::LecturerList();
        return view('lecturer',compact('list'));
    }
}
