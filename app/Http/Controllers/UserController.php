<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use User;
use App\User;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
  
        return view('admin.user_management_panel', compact('users'));
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

        $request->request->add(['user_id' =>  "mdc-".rand(100,999)]);
        $request->request->add(['status_flag' => 2]);
        // status_flag
        //$user_id      =   $request->user_id;
        $user_flag      =   $request->user_flag;
        $user_name      =   $request->user_name;
        $user_phone     =   $request->user_phone;
        $user_address   =   $request->user_address;

        User::create($request->all()); 
        return redirect()->route('UserManagements.index')
             ->with('success','*All* created successfully.');
        
    }

    public function status(Request $request, $id)
    {
        $user = User::find($id);
        $status_flag      =   $request->status_flag;
        $user->update(['status_flag' =>request('status_flag')]);
        return redirect()->route('UserManagements.index')
             ->with('success','Status changed successfully.');
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
