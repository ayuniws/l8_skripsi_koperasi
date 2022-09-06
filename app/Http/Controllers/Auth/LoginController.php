<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'nrp';
    }
    public function showLoginForm(){
        $page="login";
        return view('auth.login',compact('page'));
    }
    public function postLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nrp' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nrp', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->level == 'admin'){
                return redirect('admin/dashboard');
            }elseif (Auth::user()->level=='ketua'){
                return redirect('ketua/dashboard');
            }elseif (Auth::user()->level=='anggota'){
                return redirect('anggota/dashboard');
            }
        }
    return redirect("login");
    }
}