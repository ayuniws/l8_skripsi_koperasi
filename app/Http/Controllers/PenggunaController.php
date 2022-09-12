<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PinjamanModel;
use App\Models\SimpananModel;
use App\Models\AngsuranModel;
use Illuminate\Http\Request;
use Alert;
use App\Models\AnggotaModel;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
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
        $user = User::all();
        return view('admin.index',['users' => $user ]);
    }
    public function dashboard()
    {
        // $total_pembayaran_masuk = AngsuranModel::sum('jumlah');
        $foto = AnggotaModel::value('foto_anggota');
        $user = User::all();
        $total_user = User::count();
        $total_active_user = User::where('status', 'enabled')->count();
        $total_inactive_user = User::where('status', 'disabled')->count();
        $total_admin = User::where('level', 'admin')->count();
        $total_pinjaman = number_format(PinjamanModel::sum('jumlah'), 2, '.', ',');
        $total_simpanan = number_format(SimpananModel::sum('jumlah'), 2, '.', ',');
        $hitung_selisih = (SimpananModel::sum('jumlah')-AngsuranModel::sum('jumlah'));
        $total_selisih = ($hitung_selisih <= 0) ? '0' : $hitung_selisih;
        $total_peminjam = PinjamanModel::where('status_pinjaman','disetujui')->count();


        return view('admin.dashboard',
        compact(['foto','user','total_user','total_active_user',
        'total_inactive_user' , 'total_admin',
        'total_pinjaman', 'total_simpanan',
        'total_selisih', 'total_peminjam']));

        // return view('admin.dashboard',
        // ['users' => $user,'total_users' => $total_user,'total_active_users' => $total_active_user,
        // 'total_inactive_users' => $total_inactive_user, 'total_admins' => $total_admin,
        // 'total_pinjamans' => $total_pinjaman, 'total_simpanans' => $total_simpanan,
        // 'total_selisihs' => $total_selisih, 'total_peminjams' => $total_peminjam]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'nrp' => 'required',
            'name' => 'required',
            'email' => 'required',
            // 'level' => 'required'
        ]);
        User::create([
            'nrp' => $request['nrp'],
            'name' => $request['name'],
            'email' => $request['email'],
            'level' => $request['level'],
            'status' => 'enabled',
            // 'password' => bcrypt($request['password'])
            'password' => Hash::make($request['password'])
        ]);
        //Alert::warning('Tambah pengguna berhasil !');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengguna)
    {
        return view('admin.show',compact('pengguna'));
        // dd($pengguna->nrp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        return view('admin.edit', compact('pengguna'));
        //dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {

        //dd($request['password']);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        if(empty($request['password'])){
            User::where('id', $user)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'level' => $request['level'],
                'status' => $request['status'],
                ]);
            return redirect()->route('pengguna.index');
        }elseif (!empty($request['password'])){
            User::where('id', $user)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'level' => $request['level'],
                'status' => $request['status'],
                'password' => Hash::make($request['password'])
            ]);
                return redirect()->route('pengguna.index');
        }
        //return redirect()->route('pengguna.index')->with('Succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        //dd($id);
         {
            $id->delete();
            return redirect()->route('pengguna.index')->with('Success','Data Berhasil di Hapus');
        }
    }
}
