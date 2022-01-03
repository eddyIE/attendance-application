<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentDao;
use App\Http\Controllers\CourseController;
use App\Models\ClassModel;

class StudentController extends Controller
{
    public static function StudentList(Request $request)
    {
        $courseId = $request->all()['course-id'];
        $list = StudentDao::findByCourseId($courseId);
        $courses = CourseController::findAll();
        $currentCourse = CourseController::findById($courseId);
        if(isset($currentCourse)){
            $currentCourse = $currentCourse[0];
            $className = ClassModel::findById($currentCourse->{'class_id'})[0]->name;
            return view('index', compact('list', 'courses', 'currentCourse', 'className'));
        }
        return;
    }
}