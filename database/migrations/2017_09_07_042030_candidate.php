<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Candidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->increments('candidate_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('mobile_no');
            $table->integer('tel_no');
            $table->integer('location_id');
            $table->integer('expected_salary');
            $table->integer('pos_id');
            $table->integer('educ_id');
            $table->integer('user_id');

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
