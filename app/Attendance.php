<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['school_reg_id','class_id','section_id','period_id','user_id','comment','status'];
}
