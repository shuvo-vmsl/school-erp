<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


// class User extends Authenticatable
// {
//     use Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = [
//         'school_id', 'user_id', 'password', 'user_name', 'user_phone', 'user_address', 'user_flag', 'status_flag'
//     ];

//     /**
//      * The attributes that should be hidden for arrays.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password', 'remember_token',
//     ];
// }
class User extends Model
{
     protected $fillable = ['school_id', 'user_id', 'password', 'user_name', 'user_phone', 'user_address', 'user_flag', 'status_flag'];
}
