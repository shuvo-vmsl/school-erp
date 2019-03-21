<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = ['school_reg_id','class_id','section_id','period_id','period_teacher','period_subject','period_time','period_class_room_no','period_flag'];
}
