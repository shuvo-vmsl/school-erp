<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_reg_id');
            $table->string('class_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('period_id')->nullable();
            $table->string('enroll_id')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('teacher_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolls');
    }
}
