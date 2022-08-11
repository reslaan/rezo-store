<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }
    /**
     * Show the form for Admin login.
     *
     *
     */
    public function loginForm()
    {

        return view('admin.auth.login');
    }


    public function login(AdminLoginRequest $request)
    {
               $remember_me = ($request->has('remember_me') ? true : false);
               if (Auth::guard('admin')->attempt(['email' => $request->input('email'),'password'=> $request->input('password')], $remember_me)){
                   return redirect()->intended(route('admin.dashboard'));
               }else{
                   return redirect()->back()->with(['error' => 'هناك خطأ بالبيانات']);
               }
    }

    public function guard(){
        return Auth::guard('admin');
    }
    public function logout(){
        Auth::guard('admin')->logout();
      
        return redirect(route('admin.login'));
    }
}
