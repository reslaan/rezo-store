<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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
               if (auth()->guard('admin')->attempt(['email' => $request->input('email'),'password'=> $request->input('password')], $remember_me)){
                   return redirect()->route('admin.dashboard');
               }else{
                   return redirect()->back()->with(['error' => 'هناك خطأ بالبيانات']);
               }
    }

    public function logout(){
        auth('admin')->logout();
        return redirect(route('admin.login'));
    }
}
