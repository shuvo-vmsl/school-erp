<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $fillable =   ['school_reg_id','class_id','section_id','period_id','enroll_id','subject_id','teacher_name','user_id','result'];
}
