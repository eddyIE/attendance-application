<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class StudentModel extends Model
{
    use HasFactory;
    public $list;

    public static function StudentList()
    {
        $list = DB::select("SELECT * FROM STUDENT");
        return $list;
    }
}
