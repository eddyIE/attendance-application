<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function StudentList()
    {
        $list = Student::StudentList();
        return view('attendance.index', compact('list'));
    }
}