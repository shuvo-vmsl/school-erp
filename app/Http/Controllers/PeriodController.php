<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::all();
        return view('admin.period', compact('periods'));
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
        $period_id              =   $request->period_id;
        $period_teacher         =   $request->period_teacher;
        $period_subject         =   $request->period_subject;
        $period_time            =   $request->period_time;
        $period_class_room_no   =   $request->period_class_room_no;
        Period::create($request->all()); 
        return redirect()->route('Periods.index')
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
        $periods = Period::find($id);
        return view('admin.period_edit', compact('periods', 'id'));
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
            'period_id'             =>  'required',
            'period_teacher'        =>  'required',
            'period_subject'        =>  'required',
            'period_time'           =>  'required',
            'period_class_room_no'  =>  'required'
        ]);
        $period = Period::find($id);
        $period    ->period_id             = $request->get('period_id');
        $period    ->period_teacher        = $request->get('period_teacher');
        $period    ->period_subject        = $request->get('period_subject');
        $period    ->period_time           = $request->get('period_time');
        $period    ->period_class_room_no  = $request->get('period_class_room_no');
        $period    ->save();
        return redirect('Period');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periods    =   Period::find($id);
        $periods->delete();
        return redirect('Period');
    }
}
