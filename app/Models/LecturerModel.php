<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LecturerModel extends Model
{
    use HasFactory;

    public static function LecturerList() {
        $list = DB::select("SELECT * FROM lecturer");
        return $list;
    }
}
