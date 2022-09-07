<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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
/* ِ */

    //protected $redirectTo = RouteServiceProvider::HOME;
        //protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        //return 'email';
        return 'nrp';
    }
        //custom form login
    public function showLoginForm(){
            $page = "login";
            return view('auth.login',compact('page'));
    }

    public function postLogin(){
            return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nrp' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nrp', 'password');
        $status = User::where('nrp',$credentials['nrp'])->value('status');
        if($status == 'enabled'){
            if (Auth::attempt($credentials)) {
                //return redirect()->route('home');
                if (Auth::user()->level == 'admin'){
                    return redirect('admin/dashboard');
                }elseif(Auth::user()->level == 'ketua'){
                    return redirect('ketua/dashboard');
                }elseif(Auth::user()->level == 'anggota'){
                    return redirect('anggota/dashboard');
                }
            }

        }else{
            return redirect("login");
        }
        return redirect("login");
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

/*     protected function authenticated(Request $request, $user)
    {
        // dd($user->level);
        if (Auth::user()->level == 'admin'){
            return redirect('admin/dashboard');
        }elseif(Auth::user()->level == 'user'){
            return redirect('user/dashboard');
        }
    } */
}
