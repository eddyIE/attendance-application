<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lesson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("lesson", function (Blueprint $table) {
            $table->string("id",36);
            $table->time("start");
            $table->time("end");
            $table->string("note")->nullable();
            $table->string("lecturer_id",36);
            $table->string("course_id",36);
            $table->string("created_by",50);
            $table->dateTime("created_at")->useCurrent();

            //constraint(s)
            $table->primary("id");
            $table->foreign("lecturer_id")->references("id")->on("lecturer");
            $table->foreign("course_id")->references("id")->on("course");
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
