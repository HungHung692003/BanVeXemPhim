<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PhongChieuController extends Controller
{
    public function index()
    {
        // Ý tưởng
        $s_v    = Session::get('auth');
        if($s_v) {
            return view('admin.page.phong_chieu.index');
        } else {
            return redirect('/');
        }
    }

    public function indexVue()
    {
        return view('admin.page.phong_chieu.index_vue');
    }
}
