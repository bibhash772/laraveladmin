<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Auth;
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


    protected $redirectTo = '/admin/home';

    public function index(){
        if (Auth::viaRemember()) {
            return redirect()->route('admin/home');
        }

        return  view('auth.login');
    }

    public function login(Request $request){

        $user = User::whereEmail($request->email)->whereStatus(1)->first();

        if (!$user || !\Hash::check($request->password, $user->password)) {
        
            Session::flash('login_error', 'User name and password not matched !'); 
            
            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show'); 
            if(isset($request->auth_guard) && $request->auth_guard==3){
                return redirect('/');
            }else{
                return redirect('/admin');
            }
            
        }


        Auth::guard(GUARDS[$user->user_type])->login($user, $request->remember_me=='on');
        if(Auth::guard('admin')->check()){
             return redirect('/admin/home');
        }else{
            return redirect('/user/dashboard');
        }
                       
    }

    public function logout(Request $request){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            $request->session()->flush();
            $request->session()->regenerate();
             return redirect('/admin');
        }else{
            Auth::guard('user')->logout();
            $request->session()->flush();
            $request->session()->regenerate();
             return redirect('/');
        } 
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
