<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function index()
    {
        return view('admin.page.phim.index');
    }

    public function indexVue()
    {
        return view('admin.page.phim.index_vue');
    }
}
