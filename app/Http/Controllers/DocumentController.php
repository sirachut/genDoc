<?php

namespace App\Http\Controllers;

use App\Models\view_documents;
use Illuminate\Http\Request;
use App\User;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owner = 'sirachut';
    
        $view_documents = view_documents::all()
            ->where('name', $owner);

        return view('documents.home')
            ->with('documents',$view_documents);
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
     * @param  \App\Models\view_documents  $view_documents
     * @return \Illuminate\Http\Response
     */
    public function show(view_documents $view_documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\view_documents  $view_documents
     * @return \Illuminate\Http\Response
     */
    public function edit(view_documents $view_documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\view_documents  $view_documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, view_documents $view_documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\view_documents  $view_documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(view_documents $view_documents)
    {
        //
    }
}
