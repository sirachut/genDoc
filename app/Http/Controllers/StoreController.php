<?php

namespace App\Http\Controllers;

use App\Models\StoreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = StoreModel::all();
        $user = Auth::user();
        return view('documents.store');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        return view('documents.store')
            ->with(['user_store' => $user]);
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
            'store_id_fk' => 'required',
            'store_name' => 'required',
            'store_tel' => 'required',
            'store_teletex',
            'store_address' => 'required',
            'store_employee',
            'store_employeeNumber',
            'bank_branch',
            'bank_number',
            'bank_account',
            'bank_name',
        ]);

        StoreModel::create($request->all());
        
        return redirect()->route('home.create')
            ->with('success','Created Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StoreModel  $storeModel
     * @return \Illuminate\Http\Response
     */
    public function show(StoreModel $storeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoreModel  $storeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreModel $storeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StoreModel  $storeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreModel $storeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoreModel  $storeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreModel $storeModel)
    {
        //
    }
}
