<?php

namespace App\Http\Controllers;

use App\Models\PinjamanModel;
use Illuminate\Http\Request;
use App\Helpers\AutoNumber;
use App\Models\AnggotaModel;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjaman = PinjamanModel::all();
        return view('simpanan.index',compact('pinjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota=AnggotaModel::all();
        return view('pinjaman.create',compact('anggota'));
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
     * @param  \App\Models\PinjamanModel  $pinjamanModel
     * @return \Illuminate\Http\Response
     */
    public function show(PinjamanModel $pinjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PinjamanModel  $pinjamanModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PinjamanModel $pinjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PinjamanModel  $pinjamanModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PinjamanModel $pinjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinjamanModel  $pinjamanModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinjamanModel $pinjaman)
    {
        //
    }
}
