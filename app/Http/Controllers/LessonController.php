<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Lesson;
use App\CourseController;
use Carbon\Carbon;


class LessonController extends Controller
{
    public function create(Request $request)
    {
        dump('createLesson called');
        // Tạo mới buổi học
        $lesson = new Lesson();
        $newLessonId = uniqid();
        $lesson->id = $newLessonId;
        $lesson->start = $request->start['hour'] . ":" . $request->start['minutes'];
        $lesson->end = $request->end['hour'] . ":" . $request->end['minutes'];
        $lesson->note = $request->note;
        $lesson->courseId = $request->{'current-course-id'};
        $lesson->createdAt = $request->{'lesson-date'};
        $lesson->create();

        // Cập nhật số buổi và số giờ đã dạy của Khóa học(Course)
        $lessonDuration = strtotime($lesson->start) - strtotime($lesson->end);
        // Làm tròn đến góc phần tư gần nhất (0.0, 0.25, 0.5, 0.75)
        $lessonDuration = floor(round(abs($lessonDuration) / 3600, 2) * 4) / 4;

        //Cập nhật số buổi và số giờ đã dạy
        app('App\Http\Controllers\CourseController')->updateFinishedTime($lesson->courseId, $lessonDuration);
        return $newLessonId;
    }

    public function updateLesson(Request $request)
    {
        dump('updateLesson called');
        $updatedLesson = Lesson::findByDate($request->{'current-date'})[0];

        $lesson = new Lesson();
        $lesson->id = $updatedLesson->id;
        $lesson->start = $request->start['hour'] . ":" . $request->start['minutes'];
        $lesson->end = $request->end['hour'] . ":" . $request->end['minutes'];
        $lesson->note = $request->note;
        $lesson->courseId = $request->{'current-course-id'};
        $lesson->updateLesson($lesson);

        return $lesson->id;
    }

    public static function lessonIsExist($date)
    {
        if (Lesson::findByDate($date) != null) {
            return true;
        } else {
            return false;
        }
    }
}