<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = AnggotaModel::all();
        return view('admin.dataanggota',['anggotas' => $anggota ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'nrp' => 'required',
            'name' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'kelamin' => 'required',
            'level' => 'required',
            'alamat' => 'required',
]);
        AnggotaModel::create([
            'nrp' => $request['nrp'],
            'name' => $request['name'],
            'telp' => $request['telp'],
            'email' => $request['email'],
            'kelamin' => $request['kelamin'],
            'level' => $request['level'],
            'alamat' => $request['alamat'],
        ]);
        //Alert::warning('Tambah pengguna berhasil !');
        return redirect()->route('anggota.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaModel  $anggotaModel
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaModel $anggota)
    {
        return view('anggota.show',compact('anggota'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaModel  $anggotaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaModel $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaModel  $anggotaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $anggotaModel)
    {
                //  dd($request['id']);
                 $request->validate([
                    'nrp' => 'required',
                    'name' => 'required',
                    'telp' => 'required',
                    'email' => 'required',
                    'kelamin' => 'required',
                    'level' => 'required',
                    'alamat' => 'required',
                ]);
         
                //dd($anggotaModel);
                     AnggotaModel::where('id', $anggotaModel)->update([
                        'nrp' => $request['nrp'],
                        'name' => $request['name'],
                        'telp' => $request['telp'],
                        'email' => $request['email'],
                        'kelamin' => $request['kelamin'],
                        'level' => $request['level'],
                        'alamat' => $request['alamat'],
                        ]);
                    return redirect()->route('anggota.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaModel  $anggotaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaModel $id)
    {
        $id->delete();
        return redirect()->route('anggota.index')->with('Success','Data Berhasil di Hapus');
    }
}
