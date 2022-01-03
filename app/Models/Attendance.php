<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceModel extends Model
{
    use HasFactory;
    public $id;
    public $status;
    public $absentReason;
    public $studentId;
    public $lessonId;
    public $createdBy;

    public function create(Request $request){
        DB::insert("INSERT INTO attendance(id, status, absent_reason, student_id, lesson_id, created_by) 
        VALUES ('$this->id', '$this->status', '$this->absentReason', '$this->studentId', '$this->lessonId', 'admin') ");
    }
}