<?php

namespace App\Http\Controllers;

use App\Models\JabatanModel;
use Illuminate\Http\Request;
use App\Helpers\AutoNumber;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan  = JabatanModel::all();
        return view('jabatan.index',compact('jabatan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $no_urut = AutoNumber::getJabatanAutoNo('J');
        return view('jabatan.create',compact('no_urut'));

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
     * @param  \App\Models\JabatanModel  $jabatanModel
     * @return \Illuminate\Http\Response
     */
    public function show(JabatanModel $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JabatanModel  $jabatanModel
     * @return \Illuminate\Http\Response
     */
    public function edit(JabatanModel $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JabatanModel  $jabatanModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JabatanModel $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JabatanModel  $jabatanModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(JabatanModel $jabatan)
    {
        //
    }
}
