<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Enroll;
use App\Period;
use App\Section;
use App\ClassModel;

use DB;
use App\Quotation;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrols = Enroll::all();
        return view('admin.attendance.index', compact('enrols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendances = Attendance::all();
        return view('admin.attendance.attendance', compact('attendances'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $school_reg_id  =   $request->school_reg_id;
    //     $class_id       =   $request->class_id;
    //     $section_id     =   $request->section_id;
    //     $period_id      =   $request->period_id;
    //     $user_id        =   $request->user_id;
    //     $comment        =   $request->comment;
    //     $status          =   $request->status;
    //     Attendance::create($request->all()); 
    //     return redirect()->route('Attendances.index')
    //         ->with('success','*All* created successfully.');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
    public function student_attendance(Request $request)
    {
        $attendance = [];
		$class_id = $request->class_id;
		$section_id = $request->section_id;
		$date = $request->date;		
		if($class_id == "" || $section_id == "" || $date == ""){
			return view('backend.attendance.student-attendance',compact('attendance','date','class_id','section_id'));
		}else{		    
			$class = ClassModel::find($class_id)->class_name;
			$section = Section::find($section_id)->section_name;

			$attendance = Student::select('*','student_attendances.id AS attendance_id')
									->leftJoin('student_attendances',function($join) use ($date) {
										$join->on('student_attendances.student_id','=','students.id');
										$join->where('student_attendances.date','=',$date);
									})
									->join('student_sessions','student_sessions.student_id','=','students.id')
									->where('student_sessions.session_id',get_option('academic_year'))
									->where('student_sessions.class_id',$class_id)
									->where('student_sessions.section_id',$section_id)
									->orderBy('student_sessions.roll', 'ASC')
									->get();														                        

			return view('admin.attendance.attendance',compact('attendance','date','class','section','class_id','section_id'));
		}
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
