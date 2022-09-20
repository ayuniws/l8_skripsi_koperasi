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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AnggotaController extends Controller
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
        $vanggota = AnggotaModel::all();
        return view('anggota.index',compact('vanggota'));

    }

    public function dashboardKetua(){
        // $total_pembayaran_masuk = AngsuranModel::sum('jumlah');
        $foto = AnggotaModel::value('foto_anggota');
        $anggota = AnggotaModel::all();
        $total_anggota = AnggotaModel::count();
        $total_angsuran = number_format(AngsuranModel::sum('jumlah'), 2, '.', ',');
        $total_angsuran_today = number_format(AngsuranModel::where('tanggal',Carbon::now()->format('Y-m-d'))->sum('jumlah'), 2, '.', ',');
        $total_angsuran_month = number_format(AngsuranModel::whereMonth('tanggal',Carbon::now()->month)->sum('jumlah'), 2, '.', ',');
        $user = User::all();
        $total_user = User::count();
        $total_active_user = User::where('status', 'enabled')->count();
        $total_inactive_user = User::where('status', 'disabled')->count();
        $total_admin = User::where('level', 'admin')->count();
        $total_pinjaman = number_format(PinjamanModel::sum('jumlah'), 2, '.', ',');
        $total_simpanan = number_format(SimpananModel::sum('jumlah'), 2, '.', ',');
        $hitung_selisih = number_format((SimpananModel::sum('jumlah')-AngsuranModel::sum('jumlah')), 2, '.', ',');
        $total_selisih = number_format(($hitung_selisih <= 0) ? '0' : $hitung_selisih, 2, '.', ',');
        $total_peminjam = PinjamanModel::where('status_pinjaman','disetujui')->count();


        return view('ketua.dashboard',
        compact(['total_angsuran_month','total_angsuran_today','total_angsuran','total_anggota','anggota','foto','user','total_user','total_active_user',
        'total_inactive_user' , 'total_admin',
        'total_pinjaman', 'total_simpanan',
        'total_selisih', 'total_peminjam']));
    }

    public function dashboard()
    {
        $pinjaman_diterima = ['nrp' => Auth::user()->nrp, 'status_pengajuan' => 'Diterima'];
        $pinjaman_ditolak = ['nrp' => Auth::user()->nrp, 'status_pengajuan' => 'Ditolak'];
        $pinjaman_close = ['nrp' => Auth::user()->nrp, 'status_pinjaman' => 'Lunas'];
        $pinjaman_aktif = ['nrp' => Auth::user()->nrp, 'status_pinjaman' => 'Pembayaran'];

        // $fotos = AnggotaModel::value('foto_anggota');
        // $latest_angsuran = AngsuranModel::where('nrp', Auth::user()->nrp)->orderBy('tanggal','desc')->first();
        $total_angsuran_month = number_format(AngsuranModel::whereMonth('tanggal',Carbon::now()->month)->where('nrp',Auth::user()->nrp)->sum('jumlah'), 2, '.', ',');
        //dd($latest_angsuran);
        // $tanggal = date('d-M-Y',$tgl_latest_angsuran =  strtotime($latest_angsuran));
        $total_angsuran_today = AngsuranModel::where('tanggal',Carbon::now()->format('Y-m-d'))->sum('jumlah');
        $angsuran = AngsuranModel::where('nrp',Auth::user()->nrp)->get();
        $level = AnggotaModel::where('nrp', Auth::user()->nrp)->value('level');
        $jabatan = Str::ucfirst(Str::lower(AnggotaModel::where('nrp', Auth::user()->nrp)->value('jabatan')));
        $total_simpanan = number_format(SimpananModel::where('nrp', Auth::user()->nrp)->sum('jumlah'), 2, '.', ',');;
        $total_pinjaman = number_format(PinjamanModel::where($pinjaman_diterima)->sum('jumlah'), 2, '.', ',');;
        $pinjaman_ditolak = number_format(PinjamanModel::where($pinjaman_ditolak)->count(), 2, '.', ',');;
        $pinjaman_lunas = number_format(PinjamanModel::where($pinjaman_close)->count(), 2, '.', ',');;
        $pinjaman_berjalan = number_format(PinjamanModel::where($pinjaman_aktif)->count(), 2, '.', ',');;
        $total_angsuran = number_format(AngsuranModel::where('nrp', Auth::user()->nrp)->sum('jumlah'), 2, '.', ',');;
        $sisa_angsuran = number_format(PinjamanModel::where($pinjaman_diterima)->sum('jumlah')-AngsuranModel::where('nrp', Auth::user()->nrp)->sum('jumlah'), 2, '.', ',');;
        return view('anggota.dashboard',compact(['pinjaman_berjalan','pinjaman_lunas','pinjaman_ditolak','angsuran','total_angsuran_month','jabatan','level','total_simpanan','total_pinjaman','total_angsuran','sisa_angsuran']));
    }

  //  number_format( , 2, '.', ',');
    public function showPengajuanPinjaman(){
        $kriteri_tampil = ['status_pengajuan' => 'diajukan', 'status_pinjaman' => 'Belum Pembayaran'];
        $list_pengajuan = PinjamanModel::where($kriteri_tampil)->get();
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
            'no_rekening' => 'required',
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
                        'no_rekening' => $request['no_rekening'],
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
                        'password' => Hash::make('password'.$request['nrp']),
                    ]);
                    //Alert::warning('Tambah pengguna berhasil !');
                    return redirect()->route('anggota.index');
                }else{
                        AnggotaModel::create([
                            'nrp' => $request['nrp'],
                            'nama_anggota' => $request['nama_anggota'],
                            'no_telepon' => $request['no_telepon'],
                            'no_rekening' => $request['no_rekening'],
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
                        'no_rekening' => $request['no_rekening'],
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
                    'no_rekening' => $request['no_rekening'],
                    'tgl_lahir' => $request['tgl_lahir'],
                    'tempat_lahir' => $request['tempat_lahir'],
                    'email' => $request['email'],
                    'jenis_kelamin' => $request['jenis_kelamin'],
                    'level' => $request['level'],
                    'jabatan' => $request['jabatan'],
                    'bagian' => $request['bagian'],
                    'alamat_anggota' => $request['alamat_anggota'],
                ]);
                User::create([
                    'nrp' => $request['nrp'],
                    'name' => $request['nama_anggota'],
                    'email' => $request['email'],
                    'level' => $request['level'],
                    'status' => 'disabled',
                    'password' => Hash::make('password'.$request['nrp']),
                ]);
                return redirect()->route('anggota.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaModel  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaModel $anggota)
    {
        return view('anggota.show',compact('anggota'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaModel  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaModel $anggota)
    {
        $jabatan = JabatanModel::all();
        $bagian = BagianModel::all();
        return view('anggota.edit', compact(['anggota','jabatan','bagian']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaModel  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaModel $anggota)
    {
                //  dd($request['id']);
                 $request->validate([
                    'nrp' => 'required',
                    'nama_anggota' => 'required',
                    'alamat_anggota' => 'required',
                    'tgl_lahir' => 'required',
                    'tempat_lahir' => 'required',
                    'no_telepon' => 'required',
                    'no_rekening' => 'required',
                    'email' => 'required',
                    'jenis_kelamin' => 'required',
                    'level' => 'required',
                    'bagian' => 'required',
                    'jabatan' => 'required',
                 ]);

                // //dd($request['id']);
                $foto_anggota = $request->file('foto_anggota');
                if(isset($foto_anggota)){
                    $foto_extention = $foto_anggota->getClientOriginalExtension();
                    $nama_foto = $request->nrp . "-Foto." . $foto_extention;
                    $upload_path = 'foto_anggota/';
                    $request->file('foto_anggota')->move($upload_path, $nama_foto);

                    AnggotaModel::where('id', $request['id'])->update([
                        'nrp' => $request['nrp'],
                        'nama_anggota' => $request['nama_anggota'],
                        'no_telepon' => $request['no_telepon'],
                        'no_rekening' => $request['no_rekening'],
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

                    User::where('nrp', $request['nrp'])->update([
                        'name' => $request['nama_anggota'],
                        'email' => $request['email'],
                        'level' => $request['level'],
                        ]);
                    return redirect()->route('anggota.index');
                }else{
                    AnggotaModel::where('id', $request['id'])->update([
                        'nrp' => $request['nrp'],
                        'nama_anggota' => $request['nama_anggota'],
                        'no_telepon' => $request['no_telepon'],
                        'no_rekening' => $request['no_rekening'],
                        'tgl_lahir' => $request['tgl_lahir'],
                        'tempat_lahir' => $request['tempat_lahir'],
                        'email' => $request['email'],
                        'jenis_kelamin' => $request['jenis_kelamin'],
                        'level' => $request['level'],
                        'jabatan' => $request['jabatan'],
                        'bagian' => $request['bagian'],
                        'alamat_anggota' => $request['alamat_anggota'],
                     ]);

                    User::where('nrp', $request['nrp'])->update([
                        'name' => $request['nama_anggota'],
                        'email' => $request['email'],
                        'level' => $request['level'],
                        ]);
                    return redirect()->route('anggota.index');

                }
                return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaModel  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaModel $id)
    {
        $id->delete();
        return redirect()->route('anggota.index')->with('Success','Data Berhasil di Hapus');
    }
}
