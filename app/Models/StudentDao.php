<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Lesson;
use DB;

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

        $students = Student::StudentList();
        if (!isset($students)) {
            return $result;
        }
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
                if ($attend->status == 'late') {
                    $absents[$attend->student_id] += 1;
                } else if ($attend->status == 'without reason') {
                    $absents[$attend->student_id] = ceil($absents[$attend->student_id] + 0.33);
                } else {
                    $permissions[$attend->student_id] += 1;
                }
            }
        }
    }
}