<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    //
    public function create(Request $request)
    {
        $data = $request->all()['students'];
        foreach ($data as $student) {
            $attendance = new Attendance;
            $attendance->studentId = $student['id'];
            $attendance->status = $student['status'];
            $attendance->absentReason = $student['absent_reason'];
            // $attendance->$absentReason;
            // $attendance->$studentId;
            // $attendance->$lessonId;
            // $attendance->$createdBy;
        }
        // return view('attendance.test', compact('requests'));
    }
}