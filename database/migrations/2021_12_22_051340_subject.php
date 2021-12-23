<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("subject", function (Blueprint $table) {
            $table->string("id",36);
            $table->string("name",20)->unique();
            $table->integer("total_hours")->unsigned();
            $table->string("created_by",50);
            $table->dateTime("created_at")->useCurrent();

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
        Schema::dropIfExists('subject');
    }
}