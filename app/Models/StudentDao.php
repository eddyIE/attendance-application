<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDao extends Model
{
    use HasFactory;

    public $id;
    public $name;
    public $birthdate;
    public $class_id;
    public $absents;
    public $permission;

    public static function findByCourseId($courseId)
    {
        $result = array();

        $absents = array();
        $permissions = array();
        self::getAbsentQuantity($courseId, $absents, $permissions);

        $course = Course::findById($courseId);
        if (!isset($course)) {
            return;
        }
        $students = Student::findByClassId($course[0]->class_id);
        if (!isset($students)) {
            return $result;
        }
        // Chuẩn bị dữ liệu
        foreach ($students as $student) {
            $newStudent = new StudentDao();
            $newStudent->id = $student->id;
            $newStudent->name = $student->name;
            $newStudent->birthdate = $student->birthdate;
            $newStudent->class_id = $student->class_id;
            $newStudent->absents = isset($absents[$newStudent->id]) ? $absents[$newStudent->id] : 0;
            $newStudent->permission = isset($permissions[$newStudent->id]) ? $permissions[$newStudent->id] : 0;
            array_push($result, $newStudent);
        }
        return $result;
    }

    // Lấy số lượng buổi nghỉ/phép
    private static function getAbsentQuantity($courseId, &$absents, &$permissions)
    {
        $lessons = Lesson::findByCourseId($courseId);
        foreach ($lessons as $lesson) {
            $attends = Attendance::findByLessonId($lesson->id);

            if (!isset($attends)) {
                return;
            }
            foreach ($attends as $attend) {
                if (!isset($absents[$attend->student_id])) {
                    $absents[$attend->student_id] = 0;
                }
                if (!isset($permissions[$attend->student_id])) {
                    $permissions[$attend->student_id] = 0;
                }
                if ($attend->status == 'without reason') {
                    $absents[$attend->student_id] += 1;
                } else if ($attend->status == 'late') {
                    $absents[$attend->student_id] += 0.3;
                    // Xử lí 0.9 -> 1
                    if ($absents[$attend->student_id] * 10 % 10 == 9) {
                        $absents[$attend->student_id] += 0.1;
                    }
                } else {
                    $permissions[$attend->student_id] += 1;
                }
            }
        }
    }
}
