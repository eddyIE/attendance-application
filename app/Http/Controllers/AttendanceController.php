<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use Carbon\Carbon;
use Redirect;
use ErrorException;


class AttendanceController extends Controller
{
    public function create(Request $request)
    {
        $flag = self::validateTime($request);
        if (!$flag) {
            $message = "Thời gian buổi học không hợp lệ";
            return view("error", compact("message"));
        }

        // dump($request);
        // Check buổi học đã tồn tại theo ngày tạo
        if (app('App\Http\Controllers\LessonController')->lessonIsExist($request->{'lesson-date'}, $request->{'current-course-id'})) {
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

        // return redirect('/index');
        // Thêm request param để StudentController->StudentList lấy
        $request->request->add(['course-id' => $request->{'current-course-id'}]);
        return StudentController::StudentList($request)->with('alert', 'hello');;
    }

    private function validateTime(Request $request)
    {
        try {
            $start = $request->start['hour'] . ":" . $request->start['minutes'];
            $end = $request->end['hour'] . ":" . $request->end['minutes'];
            $current = Carbon::now("Asia/Ho_Chi_Minh")->floorMinutes()->toTimeString();
            if (strtotime($start) > strtotime($end) ||  strtotime($start) >  strtotime($current)) {
                // dump("Thời gian ko hợp lệ");
                return false;
            }
            if (((int) explode(":", $current)[0] - (int) $request->end['hour'] == 0 && (int) explode(":", $current)[1] - (int) $request->end['minutes'] > 30)
                || ((int) explode(":", $current)[0] - (int) $request->end['hour'] > 0)
            ) {
                // dump("Buổi học đã kết thúc quá 30p");
                return false;
            }
        } catch (ErrorException $e) { }
        return true;
    }
}