<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Lesson;
use App\Models\Course;
use App\LessonController;

class AttendanceController extends Controller
{
    public function create(Request $request)
    {
        dump($request->all());

        // Check buổi học đã tồn tại theo ngày tạo
        if (app('App\Http\Controllers\LessonController')->lessonIsExist($request->{'lesson-date'})) {
            $lessonId = app('App\Http\Controllers\LessonController')->updateLesson($request);
            // Xóa các thông tin điểm danh sẵn có
            Attendance::deleteByLessonId($lessonId);
        } else {
            $lessonId = app('App\Http\Controllers\LessonController')->create($request);
        }

        // Tạo (tạo lại) các bản ghi điểm danh
        $data = $request->{'students'};
        foreach ($data as $student) {
            if (!is_null($student["status"])) {
                $attendance = new Attendance();
                $attendance->studentId = $student['student_id'];
                $attendance->status = $student['status'];
                $attendance->absentReason = $student['absent_reason'];
                $attendance->lessonId = $lessonId;
                $attendance->create();
            }
        }
        return redirect('/index');
    }
}