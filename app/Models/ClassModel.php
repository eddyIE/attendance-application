<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ClassModel extends Model
{
    use HasFactory;

    public static function findById($id)
    {
        return DB::select('select * from class where id = ?', [$id]);
    }
}