<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){

        $admin = Admin::find(auth('admin')->user()->id);
        return view('admin.profile.edit')->with([
            'admin'=>$admin
        ]);
    }

    public function updateProfile(ProfileRequest $request){

        $admin = Admin::find(auth('admin')->user()->id);

        if ($request->filled('password')){
            $request->merge(['password'=>bcrypt($request->password)]);
        }else{
            unset($request['password']);
        }
        //unset id and password confirmation before store data in database
        unset($request['id'],$request['password_confirmation']);
        $admin->update($request->all());
        return redirect()->back()->with([
            'success' => 'تم التحديث بنجاح'
        ]);
    }
}
