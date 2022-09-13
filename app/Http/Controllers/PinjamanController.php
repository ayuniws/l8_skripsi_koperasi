<?php

namespace App\Http\Controllers;

use App\Models\PinjamanModel;
use Illuminate\Http\Request;
use App\Helpers\AutoNumber;
use App\Models\AnggotaModel;
use Illuminate\Support\Facades\Auth;

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
        return view('pinjaman.index',compact('pinjaman'));
    }

    public function approve(PinjamanModel $pinjaman)
    {
        //dd($pinjaman->id);
        PinjamanModel::where('id',$pinjaman->id)->update([
            'status_pengajuan' => 'Disetujui',
        ]);
        return redirect()->route('pinjaman.pengajuan-diajukan')->with('Succes','Data Berhasil di Update');
    }

    public function reject(PinjamanModel $pinjaman)
    {
        PinjamanModel::where('id',$pinjaman->id)->update([
            'status_pengajuan' => 'Ditolak',
        ]);
        return redirect()->route('pinjaman.pengajuan-diajukan')->with('Succes','Data Berhasil di Update');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListPinjaman(){

        $diajukan = PinjamanModel::where('status_pengajuan','diajukan')->all();
        $diproses = PinjamanModel::where('status_pengajuan','diproses')->all();
        $ditolak = PinjamanModel::where('status_pengajuan','ditolak')->all();
        $disetujui = PinjamanModel::where('status_pengajuan','disetujui')->all();
        // $status = []
    }
    public function getPengajuan(){
        $pengajuan = PinjamanModel::where('status_pengajuan','diajukan')->get();
        return view('pinjaman.pengajuan',compact('pengajuan'));
    }

    public function create()
    {
        $no = AutoNumber::getPinjamanAutoNo();
        $anggota=AnggotaModel::all();
        return view('pinjaman.create',compact(['anggota','no']));
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
            'angsuran' => 'required',
        ]);

        $tanggal = strtotime($request['tanggal']);
        PinjamanModel::create([
            'no' => $request['no'],
            'tanggal' => date('Y-m-d', $tanggal),
            'nrp' => $request['nrp'],
            'jumlah' => $request['jumlah'],
            'angsuran' => $request['angsuran'],
            'keterangan' => $request['keterangan'],
            'admin' => Auth::user()->name,
            'status_pengajuan' => 'Diajukan',
            'status_pinjaman' => 'Belum Pembayaran',
            ]);
        return redirect()->route('pinjaman.index');
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
        //dd($pinjaman->id);
        return view('pinjaman.edit',compact('pinjaman'));
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
        $request->validate([
            'no' => 'required',
            'tanggal' => 'required',
            'nrp' => 'required',
            'jumlah' => 'required',
        ]);

        $tanggal = strtotime($request['tanggal']);
        $pinjaman->update($request->all());
        PinjamanModel::where('id',$request['id'])->update([
            'no' => $request['no'],
            'tanggal' => date('Y-m-d', $tanggal),
            'nrp' => $request['nrp'],
            'jumlah' => $request['jumlah'],
            'angsuran' => $request['angsuran'],
            'keterangan' => $request['keterangan'],
            'admin' => Auth::user()->nrp,
        ]);
        return redirect()->route('pinjaman.index')->with('Succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinjamanModel  $pinjamanModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinjamanModel $pinjaman)
    {
        $pinjaman->delete();
        return redirect()->route('pinjaman.index')->with('Succes','Data Berhasil di Hapus');
    }
}
