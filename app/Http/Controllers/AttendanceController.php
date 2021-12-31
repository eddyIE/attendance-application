<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Lesson;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all()['students'];
        dump($request->all());
        dump($data);

        // Tạo mới buổi học
        $lesson = new Lesson();
        $newLessonId = uniqid();
        $lesson->id = $newLessonId;
        $lesson->start = $request->start;
        $lesson->end = $request->end;
        $lesson->note = $request->note;
        $lesson->courseId = $request->all()['current-course-id'];
        $lesson->createdAt = Carbon::now();
        $lesson->create();

        // Tạo bản ghi điểm danh
        foreach ($data as $student) {
            if (!is_null($student['status'])) {
                dump($student);
                $attendance = new Attendance();
                $attendance->studentId = $student['student_id'];
                $attendance->status = $student['status'];
                $attendance->absentReason = $student['absent_reason'];
                $attendance->lessonId = $newLessonId;
                $attendance->create();
            }
        }
        return redirect('/index');
    }
}