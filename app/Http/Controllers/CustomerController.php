<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function viewRegister()
    {
        return view('client.register_login.index');
    }

    public function viewLogin()
    {
        return view('client.register_login.index');
    }

    public function viewForgotPassword()
    {
        return view('client.password.forgot_password');
    }

    public function viewChangePassword()
    {
        return view('client.password.change_password');
    }

    public function viewListBill()
    {
        return view('client.page.list_bill');
    }

    public function logout()
    {
        Auth::guard('client')->logout();
        toastr()->success('Đã đăng xuất tài khoản thành công!');
        return redirect('/login');
    }

}
