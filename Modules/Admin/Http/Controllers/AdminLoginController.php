<?php

namespace Modules\Admin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //get form login
    public function getLogin()
    {
        return view('admin::pages.login.index');
    }

    //post form login
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }else {
            Toastr::error('Đăng nhập thất bại.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    //logout
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.login.getLogin');
    }
}   
