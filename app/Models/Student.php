<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Student extends Model
{
    use HasFactory;
    public $id;
    public $name;
    public $phone;
    public $parent_phone;
    public $address;
    public $gender;
    public $birthdate;
    public $class_id;
    public $created_by;
    public $created_at;
    public $full_text_search;

    public static function StudentList()
    {
        $list = DB::select("SELECT * FROM STUDENT");
        return $list;
    }

    public static function findByClassId($classId)
    {
        $list = DB::select("SELECT * FROM STUDENT where class_id = ?", [$classId]);
        return $list;
    }
}