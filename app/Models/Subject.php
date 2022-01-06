<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Subject extends Model
{
    use HasFactory;
    public $id;
    public $name;
    public $creditHour;

    static public function getAll()
    {
        $list = DB::select("SELECT * FROM subject");
        return $list;
    }
    public function add()
    {
        DB::insert("INSERT INTO subject(name, credit_hour) VALUES ('$this->name', $this->creditHour) ");
    }
    public function updateSubject($id)
    {
        $lop = DB::select("SELECT * FROM subject WHERE id = ?", [$id]);
        return $lop;
    }
    public function update_service()
    {
        DB::update("UPDATE subject SET name = ?, credit_hour = ? WHERE id = ?", [$this->name, $this->creditHour, $this->id]);
    }
    public function delete()
    {
        DB::delete("DELETE FROM subject WHERE id = ?", [$this->id]);
    }
}
