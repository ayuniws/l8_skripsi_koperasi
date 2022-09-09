<?php

namespace App\Http\Controllers;

use App\Helpers\AutoNumber;
use App\Models\BagianModel;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagian  = BagianModel::all();
        return view('bagian.index',compact('bagian'));
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
     * @param  \App\Models\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function show(BagianModel $bagian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BagianModel $bagian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BagianModel $bagian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BagianModel $bagian)
    {
        //
    }
}
