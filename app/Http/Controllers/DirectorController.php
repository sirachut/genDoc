<?php

namespace App\Http\Controllers;
use App\Models\DirectorModel;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
// USER
use Illuminate\Support\Facades\Auth;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getDirector = DirectorModel::all();

        return view('admin.director')
        ->with('getDirector', $getDirector);
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
            'director_id' => 'required',
            'teacher_getproduct_name' => 'required',
            'teacher_rank' => 'required',
            'parcelcheck_name'=> 'required',
            'headerparcel_name' => 'required',
            'director_name' => 'required'
        ]);

        DirectorModel::create($request->all());
        
        return redirect()->route('director.index');
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
        $user = Auth::user();
        $director = DB::table('directors')
        ->select(
            'directors.*',
        )
        ->get();
        $value = \App\Models\DirectorModel::find($id);
        return view('admin.directoredit',compact('value','id'))
            ->with(['getDirector' => $director])
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
        $value = \App\Models\DirectorModel::find($id);
        $value ->teacher_getproduct_name=$request->get('teacher_getproduct_name');
        $value ->teacher_rank=$request->get('teacher_rank');
        $value ->parcelcheck_name=$request->get('parcelcheck_name');
        $value ->headerparcel_name=$request->get('headerparcel_name');
        $value ->director_name=$request->get('director_name');
        $value->save();

        return redirect('director');
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
