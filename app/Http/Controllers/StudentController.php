<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentDao;
use App\Http\Controllers\CourseController;

class StudentController extends Controller
{
    public static function StudentList(Request $request)
    {
        $courseId = $request->all()['course-id'];
        $list = StudentDao::findByCourseId($courseId);
        $courses = CourseController::findAll();
        $currentCourse = CourseController::findById($courseId);
        if(isset($currentCourse)){
            $currentCourseId= $currentCourse[0]->id;
            return view('attendance.index', compact('list', 'courses', 'currentCourseId'));
        }
        return;
    }
}