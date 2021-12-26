<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HocSinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_sinh', function(Blueprint $table){
            $table->id();
            $table->string('ten_hoc_sinh',100);
            $table->boolean('gioi_tinh');
            $table->string('so_dien_thoai',20);
            $table->string('email',100);
            $table->foreignId('id_lop')->constrained('lop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoc_sinh');
    }
}
