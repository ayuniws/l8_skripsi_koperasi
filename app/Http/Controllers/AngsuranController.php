<?php

namespace App\Http\Controllers;

use App\Models\AngsuranModel;
use Illuminate\Http\Request;
use App\Helpers\AutoNumber;
use App\Models\AnggotaModel;
use Illuminate\Support\Facades\Auth;

class AngsuranController extends Controller
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

    public function index()
    {
        if(Auth::user()->level === 'admin' || Auth::user()->level == 'ketua'){
            $angsuran = AngsuranModel::all()->sortByDesc('updated_at');
            return view('angsuran.index',compact('angsuran'));
                // echo 'ketua atau admin '.Auth::user()->level;
        }elseif(Auth::user()->level === 'anggota'){
            $angsuran = AngsuranModel::where('nrp',Auth::user()->nrp)->get()->sortByDesc('updated_at');
            return view('angsuran.index',compact('angsuran'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $no = AutoNumber::getAngsuranAutoNo();
        $anggota=AnggotaModel::all();
        return view('angsuran.create',compact(['anggota','no']));
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
            'angsuran_ke' => 'required',
        ]);

        $tanggal = strtotime($request['tanggal']);
        AngsuranModel::create([
            'no' => $request['no'],
            'tanggal' => date('Y-m-d', $tanggal),
            'nrp' => $request['nrp'],
            'jumlah' => $request['jumlah'],
            'angsuran_ke' => $request['angsuran_ke'],
            'keterangan' => $request['keterangan'],
            'admin' => Auth::user()->name,
            ]);
            return redirect()->route('angsuran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AngsuranModel  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function show(AngsuranModel $angsuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AngsuranModel  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function edit(AngsuranModel $angsuran)
    {
        return view('angsuran.edit',compact('angsuran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AngsuranModel  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaModel $angsuran)
    {
        $request->validate([
            'no' => 'required',
            'tanggal' => 'required',
            'nrp' => 'required',
            'jumlah' => 'required',
            'angsuran_ke' => 'required',
        ]);

        $tanggal = strtotime($request['tanggal']);
        $angsuran->update($request->all());
        AngsuranModel::where('id',$request['id'])->update([
            'no' => $request['no'],
            'tanggal' => date('Y-m-d', $tanggal),
            'nrp' => $request['nrp'],
            'jumlah' => $request['jumlah'],
            'angsuran_ke' => $request['angsuran_ke'],
            'keterangan' => $request['keterangan'],
            'admin' => Auth::user()->name,
        ]);
        return redirect()->route('angsuran.index')->with('Succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AngsuranModel  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(AngsuranModel $angsuran)
    {
        //
    }
}
