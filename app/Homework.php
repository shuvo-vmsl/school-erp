<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = ['school_reg_id','class_id','section_id','subject_id','homework_id','teacher_id','homework', 'submit_date'];
}
