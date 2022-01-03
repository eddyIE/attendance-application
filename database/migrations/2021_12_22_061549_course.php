<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Course extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("course", function (Blueprint $table) {
            $table->string("id", 36);
            $table->string("name", 50);
            $table->integer("credit_hours")->unsigned();
            $table->string("major_id", 36);
            $table->string("class_id", 36);
            $table->string("subject_id", 36);
            $table->integer("finished_hour")->unsigned();
            $table->integer("finished_lesson");
            $table->string("created_by", 50);
            $table->dateTime("created_at")->useCurrent();

            //constraint(s)
            $table->primary("id");
            $table->foreign("class_id")->references("id")->on("class");
            $table->foreign("subject_id")->references("id")->on("subject");
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