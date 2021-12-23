<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AcademicDirector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_director', function (Blueprint $table) {
            $table->string("id",36);
            $table->string("name",50);
            $table->string("phone",20);
            $table->string("address",1000)->nullable();
            $table->boolean("gender");
            $table->string("username",100)->unique();
            $table->string("password",256);

            //constraint(s)
            $table->primary("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
