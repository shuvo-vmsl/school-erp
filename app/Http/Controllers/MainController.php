<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
//use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    function index(){
        return view('admin.auth.login');
    }
    function adhome(){
        return view('admin.index');
    }
    
}

?>