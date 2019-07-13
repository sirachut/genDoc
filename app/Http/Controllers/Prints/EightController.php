<?php

namespace App\Http\Controllers\Prints;
// DATABASE MODEL
use App\Models\ProjectModel;
use App\Models\StoreModel;
use App\Models\ProductModel;
use App\Models\View_DocumentModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($project_id)
    {
        $count = DB::table('products')
        ->select(DB::raw('COUNT(project_fk) as getCount'))
        ->where('project_fk' , $project_id)
        ->get();

        $queries = DB::table('projects')
        ->where('projects.project_id',$project_id)  
        ->join('users','projects.id_fk', '=' ,'users.id')
        ->join('stores','projects.store_fk', '=' , 'stores.store_id')
        ->select(
            'projects.*', 
            'users.name',
            'stores.store_name',
            'stores.store_tel',
            'stores.store_teletex',
            'stores.store_address',
            'stores.store_employee',
            'stores.store_employeeNumber',
            'stores.bank_branch',
            'stores.bank_number',
            'stores.bank_account',
            'stores.bank_name',
        )   
        ->first();

        $products = ProductModel::where('project_fk',$project_id)->get();

        $total = DB::table('products')
                    ->select(DB::raw('SUM(product_amount * product_price) as getTotal'))
                    ->where('project_fk' , $project_id)
                    ->get();
        

        return view('print.eight')
            ->with(['count' => $count])
            ->with(['total' => $total])
            ->with(['show' => $queries])
            ->with(['product_Q' => $products])
            ->with('project_id',$project_id);
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
