<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_reg_id')->nullable();
            $table->string('class_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('period_id')->nullable();
            $table->string('period_teacher')->nullable();
            $table->string('period_subject')->nullable();
            $table->string('period_time')->nullable();
            $table->string('period_class_room_no')->nullable();
            $table->string('period_flag')->nullable();
            // $table->string('period_enrolled_student')->nullable();
            // $table->string('period_total_present')->nullable();
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
        Schema::dropIfExists('periods');
    }
}
