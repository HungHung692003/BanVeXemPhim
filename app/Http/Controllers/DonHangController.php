<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index()
    {
        return view('admin.page.don_hang.index');
    }
}
