<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function bt1()
    {
        return view('admin.page.thong_ke.bt_1');
    }

    public function bt2()
    {
        return view('admin.page.thong_ke.bt_2');
    }

    public function bt3()
    {
        return view('admin.page.thong_ke.bt_3');
    }

    public function bt4()
    {
        return view('admin.page.thong_ke.bt_4');
    }

    public function bt5()
    {
        return view('admin.page.thong_ke.bt_5');
    }
}
