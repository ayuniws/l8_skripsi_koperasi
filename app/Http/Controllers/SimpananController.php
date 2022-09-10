<?php

namespace App\Http\Controllers;

use App\Helpers\AutoNumber;
use Illuminate\Http\Request;
use App\Models\AnggotaModel;
use App\Models\SimpananModel;
use Illuminate\Support\Facades\Auth;



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
        $no=AutoNumber::getSimpananAutoNo();
        return view('simpanan.create',compact(['anggota','no']));
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
            'no' => 'required',
            'tanggal' => 'required',
            'nrp' => 'required',
            'jumlah' => 'required',
        ]);
        SimpananModel::create([
            'no' => $request['no'],
            'tanggal' => $request['tanggal'],
            'nrp' => $request['nrp'],
            'jumlah' => $request['jumlah'],
            'keterangan' => $request['keterangan'],
            'admin' => Auth::user()->nrp,
            ]);
        return redirect()->route('simpanan.index');
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
        //dd($simpanan->id);
        return view('simpanan.edit',compact('simpanan'));
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
        $request->validate([
            'no' => 'required',
            'tanggal' => 'required',
            'nrp' => 'required',
            'jumlah' => 'required',
        ]);

        //dd($request['style']);
        $simpanan->update($request->all());
         SimpananModel::where('id',$request['id'])->update([
            'no' => $request['no'],
            'tanggal' => $request['tanggal'],
            'nrp' => $request['nrp'],
            'jumlah' => $request['jumlah'],
            'keterangan' => $request['keterangan'],
            'admin' => Auth::user()->nrp,
        ]);
        return redirect()->route('simpanan.index')->with('Succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpananModel  $simpananModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpananModel $simpanan)
    {
        $simpanan->delete();
        return redirect()->route('simpanan.index')->with('Succes','Data Berhasil di Hapus');
    }
}
