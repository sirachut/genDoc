<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ProductModel;
use App\Models\StoreModel;
use App\Models\ProjectModel;


class UserManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUser = DB::table('users')
        ->where('status' ,'user')
        ->get();

        return View('admin.usermanage')
        ->with(['getUser' => $getUser]);

        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $getUserDetail = DB::table('users')
            ->where('users.id',$id)
            ->first();

        $getProject = ProjectModel::all()
            ->where('id_fk',$id);

        $getStore = StoreModel::all()
            ->where('store_id_fk',$id);

        return View('admin.usermanageshow')
            ->with(['getProject' => $getProject])
            ->with(['getStore' => $getStore])
            ->with(['getUserDetail' => $getUserDetail]);

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
