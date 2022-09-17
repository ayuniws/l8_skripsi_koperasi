<?php

namespace App\Http\Controllers;

use App\Models\AngsuranModel;
use App\Models\PinjamanModel;
use App\Models\SimpananModel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function laporanAngsuran(){
        return view('laporan.show-laporan-angsuran');
    }

    public function laporanPinjaman(){
        return view('laporan.show-laporan-pinjaman');
    }

    public function laporanSimpanan(){
        return view('laporan.show-laporan-simpanan');
    }

    public function showLaporan(Request $request){
        $dari_periode = date('Y-m-d',strtotime($request['dari_tanggal']));
        $sd_periode = date('Y-m-d',strtotime($request['sd_tanggal']));
        $jenis = $request['jenis_laporan'];
        //$parameter_periode = [''];

        if ($jenis == 'angsuran') {
            $jenis_laporan = $jenis;
            // echo $jenis_laporan;
            $isi_laporan = AngsuranModel::where([['tanggal','>=', $dari_periode],['tanggal','<=', $sd_periode]])->get();
        }elseif($jenis == 'pinjaman'){
            $jenis_laporan = $jenis;
            // echo $jenis_laporan;
            $isi_laporan = PinjamanModel::where([['tanggal','>=', $dari_periode],['tanggal','<=', $sd_periode]])->get();
        }elseif($jenis == 'simpanan'){
            $jenis_laporan = $jenis;
            $isi_laporan = SimpananModel::where([['tanggal','>=', $dari_periode],['tanggal','<=', $sd_periode]])->get();
            // echo $jenis_laporan;
        }
        return view('laporan.laporan',compact('isi_laporan','jenis_laporan','dari_periode','sd_periode'));
    }

    public function index()
    {
        //
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
        //
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
        //
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
