<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\StoreModel;
use App\Models\ProjectModel;

// USER
use Illuminate\Support\Facades\Auth;

class StoreManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->status=="admin") {

            $getStore = DB::table('stores')
            ->where('stores.status','s')
            ->join('users','stores.store_id_fk', '=' ,'users.id')
            ->select(
                'stores.*', 
                'users.name',
            )   
            ->get();

            return view('/store/index')
            ->with('getStore',$getStore);
        }else {
           
        $getStore = StoreModel::orderBy('created_at', 'desc')
        ->where('store_id_fk', $user->id)
        ->where('status','s')
        ->get();
        
        return view('/store/index')
            ->with('getStore',$getStore);
        }

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
            'status'
        ]);

        StoreModel::create($request->all());
        
        return redirect()->route('storemanage.index')
            ->with('success','Created Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $task = StoreModel::findOrFail($id);
    
        $getProject = ProjectModel::all()
            ->where('store_fk',$id);

        return view('store.show')
            ->withTask($task)
            ->with('getProject',$getProject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $queries = DB::table('stores')
            ->select(
                'stores.*', 
            )   
            ->get();

        $user = Auth::user();

        $director = DB::table('directors')
            ->select(
                'directors.*',
            )
            ->get();
            
        $value = \App\Models\StoreModel::find($id);
        return view('store.edit',compact('value','id'))
            ->with(['director' => $director])
            ->with(['create_Q'=> $queries])
            ->with(['user' => $user]);
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
        $value = \App\Models\StoreModel::find($id);
        $value ->store_id_fk=$request->get('store_id_fk');
        $value ->store_name=$request->get('store_name');
        $value ->store_tel=$request->get('store_tel');
        $value ->store_teletex=$request->get('store_teletex');
        $value ->store_address=$request->get('store_address');
        $value ->store_employee=$request->get('store_employee');
        $value ->store_employeeNumber=$request->get('store_employeeNumber');
        $value ->bank_branch=$request->get('bank_branch');
        $value ->bank_number=$request->get('bank_number');
        $value ->bank_account=$request->get('bank_account');
        $value ->bank_name=$request->get('bank_name');
        $value ->status=$request->get('status');
        $value->save();

        return redirect('storemanage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = StoreModel::find($id);
        $blog->update(['status' => 'd']);
        // DB::table('stores')
        //     ->where('store_id', $id)
        //     ->update(['status' => 'd']);
            
        return redirect()->route('storemanage.index');
    }
}
