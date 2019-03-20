<?php

namespace App\Http\Controllers;

use App\SchoolClass;
use Illuminate\Http\Request;
use App\School;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.school_management_panel');
        $schools_class = SchoolClass::all();
  
        return view('admin.school_class', compact('schools_class'));
        //return view('admin.school_class');
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
        //$school_name        =   $request->school_name;
        $class_id       =   $request->class_id;
        $calss_teacher  =   $request->calss_teacher;
        SchoolClass::create($request->all()); 
        return redirect()->route('SchoolClasss.index')
             ->with('success','*All* created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolclass = SchoolClass::find($id);
        return view('admin.school_class_edit', compact('schoolclass', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'class_id'      =>  'required',
            'calss_teacher' =>  'required'
        ]);
        $schoolclass = SchoolClass::find($id);
        $schoolclass->class_id = $request->get('class_id');
        $schoolclass->calss_teacher = $request->get('calss_teacher');
        $schoolclass->save();
        return redirect('Class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolclass    =   SchoolClass::find($id);
        $schoolclass->delete();
        return redirect('Class');
    }
}
