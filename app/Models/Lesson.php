<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Lesson extends Model
{
    use HasFactory;
    public $id;
    public $start;
    public $end;
    public $note;
    public $lecturerId;
    public $courseId;
    public $createdBy;

    // major: 61cc74f175e5f
    // school year: 61cc75347dafd
    // class 61cc7574ad42a
    // subject: 61cc7606edb0e
    public function create()
    {
        $this->lecturerId = '5ece4797eaf5e';
        DB::insert("INSERT INTO lesson(id, start, end, note, lecturer_id, course_id, created_by)
        VALUES ('$this->id', '$this->start', '$this->end', '$this->note', '$this->lecturerId', '$this->courseId', 'admin')");
    }

    public static function findByCourseId($courseId)
    {
        return DB::select('select * from lesson where course_id = ?', [$courseId]);
    }

    public static function findByDate($date)
    {
        $query = "select * from lesson where created_at like '%$date%'";
        return DB::select($query);
    }

    public function updateLesson(Lesson $lesson)
    {
        $query = "UPDATE lesson SET
        start='$lesson->start',
        end='$lesson->end',
        note='$lesson->note'
        WHERE `id`='$lesson->id'";

        return DB::update($query);
    }
}