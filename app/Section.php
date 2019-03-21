<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['school_reg_id','class_id','section_id','section_name','section_description','section_teacher','section_cr'];
}
