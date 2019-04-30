<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enroll;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolls = Enroll::all();
        return view('admin.enroll', compact('enrolls'));
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
        $school_reg_id  =   $request->school_reg_id;
        $class_id       =   $request->class_id;
        $section_id     =   $request->section_id;
        $period_id      =   $request->period_id;
        $enroll_id      =   $request->enroll_id;
        $subject_id     =   $request->subject_id;
        $teacher_name   =   $request->teacher_name;
        $user_id        =   $request->user_id;
        $result         =   $request->result;
        Enroll::create($request->all()); 
        return redirect()->route('Enrolls.index')
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
        $enrolls    =   Enroll::find($id);
        //$en -> id = $request->get('id');
        dd($enrolls);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrolls = Enroll::find($id);
        return view('admin.enroll_edit', compact('enrolls', 'id'));
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
        $this->validate($request, [
            // 'school_reg_id' =>  'required',
            //'class_id'      =>  'required',
            'section_id'    =>  'required',
            'period_id'     =>  'required',
            //'enroll_id'     =>  'required',
            'subject_id'    =>  'required',
            'teacher_name'  =>  'required',
            //'user_id'       =>  'required',
            //'result'        =>  'required'
        ]);
        $enroll = Enroll::find($id);
        $enroll    ->school_reg_id = $request->get('school_reg_id');
        $enroll    ->class_id      = $request->get('class_id');
        $enroll    ->section_id    = $request->get('section_id');
        $enroll    ->period_id     = $request->get('period_id');
        $enroll    ->enroll_id     = $request->get('enroll_id');
        $enroll    ->subject_id    = $request->get('subject_id');
        $enroll    ->teacher_name  = $request->get('teacher_name');
        $enroll    ->user_id       = $request->get('user_id');
        $enroll    ->result        = $request->get('result');
        $enroll    ->save();
        return redirect('Enroll');
    }

    // public function test(Request $request, $id){
    //     $enroll = Enroll::find($id);
    //     $en -> id = $request->get('id');
    //     dd($en);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enrolls    =   Enroll::find($id);
        $enrolls->delete();
        return redirect('Enroll');
    }
}
