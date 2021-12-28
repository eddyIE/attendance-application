<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    public $table = 'student';
    public $timestamps = false;

    public static function StudentList() {
        $list = DB::select("SELECT *, DATE_FORMAT(`birthdate`,'%d/%m/%Y') as birth FROM student");
        return $list;
    }
}
