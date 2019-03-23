<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.section', compact('sections'));
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
        $section_id             =   $request->section_id;
        $section_name           =   $request->section_name;
        $section_description    =   $request->section_description;
        $section_teacher        =   $request->section_teacher;
        $section_cr             =   $request->section_cr;
        Section::create($request->all()); 
        return redirect()->route('Sections.index')
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
        $sections = Section::find($id);
        return view('admin.section_edit', compact('sections', 'id'));
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
            'section_id'            =>  'required',
            'section_name'          =>  'required',
            'section_description'   =>  'required',
            'section_teacher'       =>  'required',
            'section_cr'            =>  'required'
        ]);
        $section = Section::find($id);
        $section    ->section_id            = $request->get('section_id');
        $section    ->section_name          = $request->get('section_name');
        $section    ->section_description   = $request->get('section_description');
        $section    ->section_teacher       = $request->get('section_teacher');
        $section    ->section_cr            = $request->get('section_cr');
        $section    ->save();
        return redirect('Section');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sections    =   Section::find($id);
        $sections->delete();
        return redirect('Section');
    }
}
