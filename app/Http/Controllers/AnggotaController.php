<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\AngsuranModel;
use App\Models\BagianModel;
use App\Models\JabatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\PinjamanModel;
use App\Models\SimpananModel;


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

    public function dashboardKetua(){
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


        return view('ketua.dashboard',
        compact(['foto','user','total_user','total_active_user',
        'total_inactive_user' , 'total_admin',
        'total_pinjaman', 'total_simpanan',
        'total_selisih', 'total_peminjam']));
    }

    public function dashboard()
    {
        $fotos = AnggotaModel::value('foto_anggota');
        $user = User::all();
        $total_user = User::count();
        $total_active_user = User::where('status', 'enabled')->count();
        $total_inactive_user = User::where('status', 'disabled')->count();
        $total_admin = User::where('level', 'admin')->count();
        return view('anggota.dashboard',['foto'=>$fotos,'users' => $user,'total_users' => $total_user,'total_active_users' => $total_active_user, 'total_inactive_users' => $total_inactive_user, 'total_admins' => $total_admin ]);
    }

    public function showPengajuanPinjaman(){
        $list_pengajuan = PinjamanModel::where('status_pengajuan','diajukan')->get();
        return view('ketua.daftar-pengajuan-pinjaman',compact('list_pengajuan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bagian = BagianModel::all();
        $jabatan = JabatanModel::all();
        return view('anggota.create',compact(['bagian','jabatan']));
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
            'nama_anggota' => 'required',
            'alamat_anggota' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'level' => 'required',
            'bagian' => 'required',
            'jabatan' => 'required',
        ]);

        if (isset($request['add_login'])){
            $foto_anggota = $request->file('foto_anggota');
            if(isset($foto_anggota)){
                $foto_extention = $foto_anggota->getClientOriginalExtension();
                $nama_foto = $request->nrp . "-Foto." . $foto_extention;
                $upload_path = 'foto_anggota/';
                $request->file('foto_anggota')->move($upload_path, $nama_foto);
                // isset($request['status']) ? $status = 'enabled' : $status ='disabled';

                    AnggotaModel::create([
                        'nrp' => $request['nrp'],
                        'nama_anggota' => $request['nama_anggota'],
                        'no_telepon' => $request['no_telepon'],
                        'tgl_lahir' => $request['tgl_lahir'],
                        'tempat_lahir' => $request['tempat_lahir'],
                        'email' => $request['email'],
                        'jenis_kelamin' => $request['jenis_kelamin'],
                        'level' => $request['level'],
                        'jabatan' => $request['jabatan'],
                        'bagian' => $request['bagian'],
                        'alamat_anggota' => $request['alamat_anggota'],
                        'foto_anggota' => $nama_foto,
                        ]);

                    User::create([
                        'nrp' => $request['nrp'],
                        'name' => $request['nama_anggota'],
                        'email' => $request['email'],
                        'level' => $request['level'],
                        'status' => 'enabled',
                        'password' => Hash::make($request['nrp'].'12345'),
                    ]);
                    //Alert::warning('Tambah pengguna berhasil !');
                    return redirect()->route('anggota.index');
                }else{
                        AnggotaModel::create([
                            'nrp' => $request['nrp'],
                            'nama_anggota' => $request['nama_anggota'],
                            'no_telepon' => $request['no_telepon'],
                            'tgl_lahir' => $request['tgl_lahir'],
                            'tempat_lahir' => $request['tempat_lahir'],
                            'email' => $request['email'],
                            'jenis_kelamin' => $request['jenis_kelamin'],
                            'level' => $request['level'],
                            'jabatan' => $request['jabatan'],
                            'bagian' => $request['bagian'],
                            'status' => 'disabled',
                            'alamat_anggota' => $request['alamat_anggota'],
                        ]);
                            return redirect()->route('anggota.index');
                }
        }else{
            $foto_anggota = $request->file('foto_anggota');
            if(isset($foto_anggota)){
                    $foto_extention = $foto_anggota->getClientOriginalExtension();
                    $nama_foto = $request->nrp . "-Foto." . $foto_extention;
                    $upload_path = 'foto_anggota/';
                    $request->file('foto_anggota')->move($upload_path, $nama_foto);
                    AnggotaModel::create([
                        'nrp' => $request['nrp'],
                        'nama_anggota' => $request['nama_anggota'],
                        'no_telepon' => $request['no_telepon'],
                        'tgl_lahir' => $request['tgl_lahir'],
                        'tempat_lahir' => $request['tempat_lahir'],
                        'email' => $request['email'],
                        'jenis_kelamin' => $request['jenis_kelamin'],
                        'level' => $request['level'],
                        'jabatan' => $request['jabatan'],
                        'bagian' => $request['bagian'],
                        'status' => 'disabled',
                        'alamat_anggota' => $request['alamat_anggota'],
                        'foto_anggota' => $nama_foto,
                    ]);
                        return redirect()->route('anggota.index');
            }else{
                AnggotaModel::create([
                    'nrp' => $request['nrp'],
                    'nama_anggota' => $request['nama_anggota'],
                    'no_telepon' => $request['no_telepon'],
                    'tgl_lahir' => $request['tgl_lahir'],
                    'tempat_lahir' => $request['tempat_lahir'],
                    'email' => $request['email'],
                    'jenis_kelamin' => $request['jenis_kelamin'],
                    'level' => $request['level'],
                    'jabatan' => $request['jabatan'],
                    'bagian' => $request['bagian'],
                    'status' => 'disabled',
                    'alamat_anggota' => $request['alamat_anggota'],
                ]);
                User::create([
                    'nrp' => $request['nrp'],
                    'name' => $request['nama_anggota'],
                    'email' => $request['email'],
                    'level' => $request['level'],
                    'status' => 'disabled',
                    'password' => Hash::make($request['nrp'].'12345'),
                ]);
                return redirect()->route('anggota.index');
            }
        }
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
