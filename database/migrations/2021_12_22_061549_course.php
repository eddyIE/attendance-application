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
            $table->string("id",36);
            $table->string("name",50);
            $table->integer("credit_hours")->unsigned();
            $table->integer("remain_hours")->unsigned();
            $table->string("class_id",36);
            $table->string("subject_id",36);
            $table->string("created_by",50);
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
