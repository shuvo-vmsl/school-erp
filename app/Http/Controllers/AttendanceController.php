<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        return view('admin.attendance', compact('attendances'));
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
        $user_id        =   $request->user_id;
        $comment        =   $request->comment;
        $status          =   $request->status;
        Attendance::create($request->all()); 
        return redirect()->route('Attendances.index')
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
        $attendances = Attendance::find($id);
        return view('admin.attendance_edit', compact('attendances', 'id'));
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
            //'school_reg_id' =>  'required',
            //'class_id'      =>  'required',
            //'section_id'    =>  'required',
            //'period_id'     =>  'required',
            //'user_id'       =>  'required',
            'comment'       =>  'required',
            'status'        =>  'required'
        ]);
        $attendance = Attendance::find($id);
        $attendance    ->comment        = $request->get('comment');
        $attendance    ->status         = $request->get('status');
        $attendance    ->save();
        return redirect('Attendance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendances    =   Attendance::find($id);
        $attendances->delete();
        return redirect('Attendance');
    }
}
