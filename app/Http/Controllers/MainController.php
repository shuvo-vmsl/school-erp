<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    function index(){
        return view('admin.auth.auth');
    }
    function adhome(){
        return view('admin.index');
    }
    function checklogin(Request $request){
        $this->validate($request, [
            'school_id' => 'required',
            'user_id'   => 'required',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'school_id'=> $request->get('school_id'),
            'user_id'  => $request->get('user_id'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)){
            return redirect('adhome');
        }
        else{
            return back()->with('error', 'Wrong Login Details');
        }

    }

    function successlogin(){
        return view('admin.index');
    }

    function logout(){
        Auth::logout();
        return redirect('auth');
    }
}

?>