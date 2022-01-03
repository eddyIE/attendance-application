<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

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
}