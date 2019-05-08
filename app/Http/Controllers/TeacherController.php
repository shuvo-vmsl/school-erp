<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Teacher;
use App\User;
use App\Picklist;
use Validator;
use Hash;
use Image;


class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::select('*','teachers.id AS id')
        ->join('users','users.id','=','teachers.user_id')
        ->orderBy('teachers.id', 'DESC')->get();
        return view('backend.teachers.teacher-list',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teachers.teacher-add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel_import(Request $request)
    {
        if( ! $request->ajax()){
         return view('backend.teachers.excel_import');
     }else{
         return view('backend.teachers.modal.excel_import');
     }
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'birthday' => 'required',
            'gender' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'address' => 'required',
            'joining_date' => 'required',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
        ]);

        $ImageName='profile.png';
        if ($request->hasFile('image')){
           $image = $request->file('image');
           $ImageName = time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(400, 400)->save(base_path('public/uploads/images/teachers/').$ImageName);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'Teacher';
        $user->phone = $request->phone;
        $user->image = 'teachers/'.$ImageName;
        $user->save();

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->name = $request->name;
        $teacher->designation = $request->designation;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->religion = $request->religion;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->joining_date = $request->joining_date;
        $teacher->save();

        return redirect('teachers')->with('success', _lang('Information has been added'));
    }


	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function excel_store(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);
		
        $path = $request->file('excel_file')->getRealPath();
        $teachers = (new FastExcel)->import($path, function ($line) {
            if (($line['email'] != '') AND ( ! User::where('email', $line['email'])->exists())) {

                if( ! Picklist::where('value', $line['designation'])->exists()){
                    Picklist::insert(['value' => $line['designation']]);
                }
                //user data
                $user = new User();
                $user->name = $line['name'];
                $user->email = $line['email'];
                $user->password = Hash::make($line['password']);
                $user->user_type = 'Teacher';
                $user->phone = $line['phone'];
                $user->image = 'teachers/profile.png';
                $user->save();
				
                //teacher data
                $teacher = new Teacher();
                $teacher->user_id = $user->id;
                $teacher->name = $line['name'];
                $teacher->designation = $line['designation'];
                $teacher->birthday = $line['birthday'];
                $teacher->gender = $line['gender'];
                $teacher->religion = $line['religion'];
                $teacher->phone = $line['phone'];
                $teacher->address = $line['address'];
                $teacher->joining_date = $line['joining_date'];
                $teacher->save();
            }
        });
        return redirect('teachers')->with('success', _lang('Information has been import'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $teacher = Teacher::select('*','teachers.id AS id')
        ->join('users','users.id','=','teachers.user_id')
        ->where('teachers.id',$id)
        ->first();
		if(! $request->ajax()){
		    return view('backend.teachers.teacher-view',compact('teacher'));
		}else{
			return view('backend.teachers.modal.teacher-view',compact('teacher'));
		} 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::select('*','teachers.id AS id')
        ->join('users','users.id','=','teachers.user_id')
        ->where('teachers.id',$id)
        ->first();
        return view('backend.teachers.teacher-edit',compact('teacher'));
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
        $teacher = Teacher::find($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'birthday' => 'required',
            'gender' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'address' => 'required',
            'joining_date' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($teacher->user_id),
            ],
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
        ]);

        $teacher->name = $request->name;
        $teacher->designation = $request->designation;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->religion = $request->religion;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->joining_date = $request->joining_date;
        $teacher->save();

        $user = User::find($teacher->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('image')){
           $image = $request->file('image');
           $ImageName = time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(400, 400)->save(base_path('public/uploads/images/teachers/') . $ImageName);
           $user->image = 'teachers/'.$ImageName;
       }
       $user->save();

       return redirect('teachers')->with('success', _lang('Information has been updated'));
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        $user = User::find($teacher->user_id);
        $user->delete();

        return redirect('teachers')->with('success', _lang('Information has been deleted'));
    }
}
