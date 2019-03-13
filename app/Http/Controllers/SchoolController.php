<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.school_management_panel');
        $schools = School::all();
  
        return view('admin.school_management_panel', compact('schools'));
            //->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'user_id'       => 'required',
        //     'user_flag'     => 'required',
        //     'user_name'     => 'required',
        //     'user_phone'    => 'required',
        //     'user_address'  => 'required'
        // ]);

        $request->request->add(['school_reg_id' =>  "School-".rand(100,999)]);
        $request->request->add(['school_flag' =>  2]);        
        $school_name        =   $request->school_name;
        $school_place       =   $request->school_place;
        $school_teacher_no  =   $request->school_teacher_no;
        $school_student_no  =   $request->school_student_no;

        School::create($request->all()); 
        return redirect()->route('SchoolManagements.index')
             ->with('success','*All* created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
