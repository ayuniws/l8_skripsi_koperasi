<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Alert;
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
        $user = User::all();
        $total_user = User::count();
        $total_active_user = User::where('status', 'enabled')->count();
        $total_inactive_user = User::where('status', 'disabled')->count();
        $total_admin = User::where('level', 'admin')->count();
        return view('admin.dashboard',['users' => $user,'total_users' => $total_user,'total_active_users' => $total_active_user, 'total_inactive_users' => $total_inactive_user, 'total_admins' => $total_admin ]);
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
