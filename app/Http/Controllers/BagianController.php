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
        $no_urut = AutoNumber::getBagianAutoNo('B');
        return view('bagian.create',compact('no_urut'));
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
            'kode_bagian' => 'required',
            'nama_bagian' => 'required',
        ]);

        BagianModel::create([
            'kode_bagian' => $request['kode_bagian'],
            'nama_bagian' => $request['nama_bagian'],
            ]);
        return redirect()->route('bagian.index');
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
        //dd($bagian->id);
        return view('bagian.edit',compact('bagian'));
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
        $request->validate([
            'kode_bagian' => 'required',
            'nama_bagian' => 'required',
        ]);

        //dd($request['style']);
        $bagian->update($request->all());
         BagianModel::where('id',$request['id'])->update([
            'kode_bagian' => $request['kode_bagian'],
            'nama_bagian' => $request['nama_bagian'],
        ]);
        return redirect()->route('bagian.index')->with('Succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BagianModel $bagian)
    {
        $bagian->delete();
        return redirect()->route('bagian.index')->with('Succes','Data Berhasil di Hapus');
    }
}
