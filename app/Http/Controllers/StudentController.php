<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;

class StudentController extends Controller
{
    public function StudentList()
    {
        $list = StudentModel::StudentList();
        return view('index', compact('list'));
    }
}