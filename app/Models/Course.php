<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;
    public $subject;
    public $id;
    public $name;
    public $credit_hours;

    public static function findAll()
    {
        return DB::select("select * from course");
    }

    public static function findById($id)
    {
        return DB::select("select * from course where id = ?", [$id]);
    }

    public static function updateFinishedHour($id, $lessonDuration)
    {
        $query = "
        UPDATE course
        SET
            finished_hour = finished_hour + $lessonDuration,
            finished_lesson = finished_lesson + 1
        WHERE `id` = '$id'
        ";
        DB::update($query);
    }

    public static function index()
    {
        /*$data = DB::table('course')
            ->leftJoin('lecturer_course_rel','course.id','=','lecturer_course_rel.id')
            ->leftJoin('lecturer','lecturer_course_rel.lecturer_id','=','lecturer.id')
            ->join('class','course.class_id','=','class.id')
            ->join('subject','course.subject_id','=','subject.id')
            ->select(DB::raw(
                'course.name AS course_name,
                class.name AS class,
                subject.name AS subject,
                course.credit_hours AS credit_hours,
                lecturer.name AS lecturer'
            ))
            ->get();*/      //<<<BEAUTIFUL CODE>>> but the lecturer name is returning null...

        $data = DB::select(
            "SELECT
                course.id AS id,
                course.name AS course_name,
                class.name AS class,
                subject.name AS subject,
                course.credit_hours AS credit_hours,
                lecturer.name AS lecturer,
                DATE_FORMAT(course.created_at,'%d/%m/%Y') as cre_date
            FROM `course`
            JOIN class ON course.class_id = class.id
            JOIN SUBJECT ON course.subject_id = SUBJECT.id
            LEFT JOIN lecturer_course_rel ON course.id = lecturer_course_rel.course_id
            LEFT JOIN lecturer ON lecturer_course_rel.lecturer_id = lecturer.id
            ORDER BY cre_date ASC"
        );                  //<<<UGLY CODE, EURGHH>>>

        return $data;
    }

    /*start of CourseController::create()*/
    public static function classData()
    {
        $class = DB::select("SELECT * FROM class");
        return $class;
    }

    public static function subjectData()
    {
        $subject = DB::select("SELECT * FROM subject");
        return $subject;
    }

    public static function lecturerData()
    {
        $lecturer = DB::select("SELECT * FROM lecturer WHERE role = 0"); //non-admin
        return $lecturer;
    }
    /*end of CourseController::create()*/

    public function store()
    {
        $courseId = uniqid();   //course id
        $lcrId = uniqid();      //lecturer_course_rel id

        DB::insert(
            "INSERT INTO course (
                `id`,
                `name`,
                `credit_hours`,
                `remain_hours`,
                `class_id`,
                `subject_id`,
                `created_by`
                )
                VALUES (
                    '$courseId',
                    '$this->courseName',
                    '$this->creditHours',
                    '$this->creditHours',
                    '$this->class',
                    '$this->subject',
                    '$this->createdBy'
                )"
        );
        DB::insert(
            "INSERT INTO lecturer_course_rel(
                `id`,
                `type`,
                `lecturer_id`,
                `course_id`,
                `created_by`
                        )
            VALUES(
                '$lcrId',
                '$this->type',
                '$this->lecturer',
                '$courseId',
                '$this->createdBy'
            )"
        );
    }

    public static function show($id)
    {
        $data = DB::select(
            "SELECT
                course.id AS id,
                course.name AS course,
                course.credit_hours AS credit_hours,
                class.name AS class,
                subject.name AS subject,
                lecturer.name AS lecturer,
                lecturer_course_rel.id AS lcr_id,
                lecturer_course_rel.type AS type,
                DATE_FORMAT(course.created_at,'%d/%m/%Y') as cre_date
            FROM
                course
            JOIN class ON course.class_id = class.id
            JOIN subject ON course.subject_id = subject.id
            LEFT JOIN lecturer_course_rel ON course.id = lecturer_course_rel.course_id
            LEFT JOIN lecturer ON lecturer_course_rel.lecturer_id = lecturer.id
            WHERE course.id = '$id'"
        );

        return $data;
    }

    public function updates()
    {
        DB::update(
            "UPDATE `course`
            SET
                `name` = '$this->id',
                `credit_hours` = '$this->creditHours',
                `class_id` = '$this->class',
                `subject_id` = '$this->subject'
            WHERE id = '$this->courseId'"
        );
        DB::update(
            "UPDATE `lecturer_course_rel`
            SET
                `type` = '$this->type',
                `lecturer_id` = '$this->lecturer'
            WHERE course_id = '$this->courseId'"
        );
    }

    public function delete()
    {
        DB::delete("DELETE FROM lecturer_course_rel WHERE course_id = '$this->courseId'");
        DB::delete("DELETE FROM course WHERE id = '$this->courseId'");
    }
}