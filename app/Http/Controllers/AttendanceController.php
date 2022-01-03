<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Lesson;
use App\Models\Course;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function create(Request $request)
    {
        dump($request->all());

        // Check buổi học tồn tại không
        if (self::lessonIsExist($request->{'current-date'})) {
            $lessonId = self::updateLesson($request);
            // Xóa các thông tin điểm danh sẵn có
            Attendance::deleteByLessonId($lessonId);
        } else {
            dump('creating');
            $lessonId = self::createLesson($request);
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

    public function createLesson(Request $request)
    {
        dump('createLesson called');
        // Tạo mới buổi học
        $lesson = new Lesson();
        $newLessonId = uniqid();
        $lesson->id = $newLessonId;
        $lesson->start = $request->start;
        $lesson->end = $request->end;
        $lesson->note = $request->note;
        $lesson->courseId = $request->{'current-course-id'};
        $lesson->createdAt = Carbon::now();
        $lesson->create();

        // Cập nhật số buổi và số giờ đã dạy của Khóa học(Course)
        $lessonDuration = strtotime($lesson->start) - strtotime($lesson->end);
        // Làm tròn đến góc phần tư gần nhất (0.0, 0.25, 0.5, 0.75)
        $lessonDuration = floor(round(abs($lessonDuration) / 3600, 2) * 4) / 4;
        self::updateCourse($lesson->courseId, $lessonDuration);
        return $newLessonId;
    }

    public function updateLesson(Request $request)
    {
        dump('updateLesson called');
        $updatedLesson = Lesson::findByDate($request->{'current-date'})[0];

        $lesson = new Lesson();
        $lesson->id = $updatedLesson->id;
        $lesson->start = $request->start;
        $lesson->end = $request->end;
        $lesson->note = $request->note;
        $lesson->courseId = $request->{'current-course-id'};
        $lesson->updateLesson($lesson);

        return $lesson->id;
    }

    public function updateCourse($courseId, $duration)
    {
        dump('updateCourse called - course id: ' . $courseId . "duration: " . $duration);
        Course::updateFinishedHour($courseId, $duration);
    }

    private function lessonIsExist($date)
    {
        if (Lesson::findByDate($date) != null) {
            return true;
        } else {
            return false;
        }
    }
}