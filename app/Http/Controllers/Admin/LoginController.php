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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
