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
}