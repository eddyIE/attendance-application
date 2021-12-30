<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentDao;

class StudentController extends Controller
{
    public function StudentList()
    {
        $list = StudentDao::findByCourseId('61cc749f22125');
        return view('attendance.index', compact('list'));
    }
}