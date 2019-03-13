<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['school_reg_id', 'school_name', 'school_place', 'school_teacher_no', 'school_student_no', 'school_flag'];
}
