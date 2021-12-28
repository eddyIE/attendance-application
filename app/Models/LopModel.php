<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopModel extends Model
{
    use HasFactory;
    public $id;
    public $ten_lop;
    static public function danh_sach_lop(){
        $list = DB::select("SELECT * FROM lop");
        return $list;
    }
    public function them_lop_xu_ly(){
        DB::insert("INSERT INTO lop(ten_lop) VALUES ('$this->ten_lop') ");
    }
    static public function sua_lop($id){
        $lop = DB::select("SELECT * FROM lop WHERE id = ?",[$id]);
        return $lop;
    }
    public function sua_lop_xu_ly(){
        DB::update("UPDATE lop SET ten_lop = ? WHERE id = ?",[$this->ten_lop,$this->id]);
    }
    public function xoa_lop(){
        DB::delete("DELETE FROM lop WHERE id = ?",[$this->id]);
    }

}
