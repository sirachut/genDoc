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

        if ($user->name=="admin") {

            $Project_n_Queries = DB::table('projects')
            ->join('users','projects.id_fk', '=' ,'users.id')
            ->select(
                'projects.*', 
                'users.name',
            )   
            ->get();


            $StoreQueries = StoreModel::all();
            return view('documents.home')
            ->with(['project_n_Q' => $Project_n_Queries])
            ->with(['store_Q' => $StoreQueries]);
        }else {

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
        }

       
        
        
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $queries = StoreModel::all()
           ->where('status','s');

        $user = Auth::user();

        $director = DB::table('directors')
            ->select(
                'directors.*',
            )
            ->first();

        // $StoreQueries = StoreModel::all()
        //     ->where('id_fk', $user->id);

        return view('documents.create')
            ->with(['director' => $director])
            ->with(['create_Q'=> $queries])
            ->with(['user' => $user]);
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
            'id_fk' => 'required',
            'store_fk' => 'required',
            'bill_number',
            'project_department',
            'project_name',
            'project_subject',
            'project_getday',
            'project_number',
            'project_status',
            'project_orderNumber',
            'project_typemoney',
            'project_datein',
            'project_dateget',
            'teacher_get_name',
            'teacher_rank',
            'parcel_name',
            'parcelLeader_name',
            'manageschool_name',
            'created_at',
            'updated_at',
        ]);


        ProjectModel::create($request->all());

        return redirect()->route('home.index')
            ->with('success','Created successfully');
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

        $products = ProductModel::where('project_fk',$project_id)->get();

        // $total = DB::table('products')
        //     ->sum('product_amount'*'product_price')
        //     ->where('project_fk' , $project_id)
        //     ->get();

        $total = DB::table('products')
                    ->select(DB::raw('SUM(product_amount * product_price) as ASD'))
                    ->where('project_fk' , $project_id)
                    ->get();

        return view('documents.show')
            ->with(['total' => $total])
            ->with(['show' => $queries])
            ->with(['product_Q' => $products])
            ->with('project_id',$project_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectModel  $projectModel
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
            ->first();
            
        $value = \App\Models\ProjectModel::find($id);
        return view('documents.edit',compact('value','id'))
            ->with(['director' => $director])
            ->with(['create_Q'=> $queries])
            ->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectModel  $projectModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $value = \App\Models\ProjectModel::find($id);
        $value ->id_fk=$request->get('id_fk');
        $value ->store_fk=$request->get('store_fk');
        $value ->bill_number=$request->get('bill_number');
        $value ->project_department=$request->get('project_department');
        $value ->project_name=$request->get('project_name');
        $value ->project_subject=$request->get('project_subject');
        $value ->project_getday=$request->get('project_getday');
        $value ->project_number=$request->get('project_number');
        $value ->project_status=$request->get('project_status');
        $value ->project_orderNumber=$request->get('project_orderNumber');
        $value ->project_typemoney=$request->get('project_typemoney');
        $value ->teacher_get_name=$request->get('teacher_get_name');
        $value ->teacher_rank=$request->get('teacher_rank');
        $value ->parcel_name=$request->get('parcel_name');
        $value ->parcelLeader_name=$request->get('parcelLeader_name');
        $value ->manageschool_name=$request->get('manageschool_name');
        $value->save();

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectModel  $projectModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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



