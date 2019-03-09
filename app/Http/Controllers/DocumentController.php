<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// DATABASE MODEL
use App\Models\ProjectModel;
use App\Models\StoreModel;
use App\Models\ProductModel;
use App\Models\View_DocumentModel;

// USER
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
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
        $user = Auth::user();

        $Project_n_Queries = ProjectModel::all()
            ->where('project_status','n')
            ->where('id_fk', $user->id);

        $Project_d_Queries = ProjectModel::all()
            ->where('project_status','d')
            ->where('id_fk', $user->id);
            
        $StoreQueries = StoreModel::all()
            ->where('id_fk', $user->id);
            
        return view('documents.home')
            ->with(['project_n_Q' => $Project_n_Queries])
            ->with(['project_d_Q' => $Project_d_Queries])
            ->with(['store_Q' => $StoreQueries]);
        
        // $queries = DB::table('projects')
        //     ->join('users','projects.id_fk', '=' ,'users.id')
        //     ->join('stores','projects.store_fk', '=' , 'stores.store_id')
        //     ->join('bills','projects.bill_fk', '=', 'bills.bill_id')
        //     ->where('projects.id_fk',$user->id)
        //     ->select(
        //         'projects.*', 
        //         'users.name',
        //         'stores.store_name',
        //         'stores.store_tel',
        //         'stores.store_teletex',
        //         'stores.store_address',
        //         'stores.store_employee',
        //         'stores.store_employeeNumber',
        //         'stores.bank_branch',
        //         'stores.bank_number',
        //         'stores.bank_account',
        //         'stores.bank_name',
        //         'bills.bill_number',
        //     )
        //     ->get();

        // return view('documents.home')
        //         ->with(['index' => $queries]);  

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStores(StoreRequest $storeRequest)
    {
        $storeRequest->validate([
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

        StoreModel::create($storeRequest->all());

        return redirect()->route('home.index')
            ->with('success','Created seccessfully');

    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_fk' => 'required',
            'store_fk' => 'required',
            'bill_number',
            'project_department',
            'project_name',
            'project_subject',
            'project_number',
            'project_status',
            'project_orderNumber',
            'project_typemoney',
            'created_at',
            'updated_at',
        ]);

        ProjectModel::create($request->all());

        return redirect()->route('home.index')
            ->with('success','Created seccessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectModel  $projectModel
     * @return \Illuminate\Http\Response
     */
    public function show($project_id)
    {
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

        $products = ProductModel::all()
            ->where('project_fk',$project_id);


        return view('documents.show')
        ->with(['show' => $queries])
        ->with(['product_Q' => $products]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectModel  $projectModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectModel $projectModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectModel  $projectModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectModel $projectModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectModel  $projectModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectModel $ProjectModel, $id)
    {
        $blog = ProjectModel::find($id);
        $blog->delete();
        return redirect()->route('home.index')
                        ->with('success','ลบข้อมูลสำเร็จ');
    }

    public static function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        // $strHour= date("H",strtotime($strDate));
        // $strMinute= date("i",strtotime($strDate));
        // $strSeconds= date("s",strtotime($strDate));
        $strMonthFull = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthFull[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

}



