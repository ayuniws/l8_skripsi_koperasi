<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;
use App\Models\SimpananModel;



class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simpanan = SimpananModel::all();
        return view('simpanan.index',compact('simpanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota=AnggotaModel::all();
        return view('simpanan.create',compact('anggota'));
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
            'kode_jabatan' => 'required',
            'nama_jabatan' => 'required',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimpananModel  $simpananModel
     * @return \Illuminate\Http\Response
     */
    public function show(SimpananModel $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpananModel  $simpananModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpananModel $simpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimpananModel  $simpananModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpananModel $simpanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpananModel  $simpananModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpananModel $simpanan)
    {
        //
    }
}
