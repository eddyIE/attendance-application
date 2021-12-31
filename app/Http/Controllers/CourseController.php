<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //
    public function init()
    {
        $courses = Course::findAll();
        return view('attendance.index', compact('courses'));
    }

    public static function findAll()
    {
        return Course::findAll();
    }

    public static function findById($id){
        return Course::findById($id);
    }
}