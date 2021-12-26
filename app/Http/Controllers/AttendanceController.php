<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Attendance;

class AttendanceController extends Controller
{
    public function store(Request $request){
        // Kiểm tra xem dữ liệu từ client gửi lên bao gốm những gì
        // dd($request);

        // Tạo mới user với các dữ liệu tương ứng với dữ liệu được gán trong $data
        foreach($request->all() as $data){
            Attendance::create($data);
        }
    }
}