<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;



class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $getUserDetail = DB::table('users')
            ->where('users.id',$user->id)  
            ->get();

        return view('users.profile')
        ->with(['getUserDetail' => $getUserDetail]);
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
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'fullname' => 'required',
            'password'=> 'required',
        ]);

        User::create($request->all());
        
        return redirect()->route('profile.index');
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
        $getUserDetail = DB::table('users')
            ->where('users.id',$id)  
            ->get();
        $value = \App\User::find($id);
        return view('users.profileedit',compact('value','id'))
            ->with(['getUserDetail' => $getUserDetail]);
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
        $value = \App\User::find($id);
        $value ->name=$request->get('name');
        $value ->fullname=$request->get('fullname');
        $value ->email=$request->get('email');
        $value ->password=$request->get('password');
        $value->save();

        return redirect('profile');
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
