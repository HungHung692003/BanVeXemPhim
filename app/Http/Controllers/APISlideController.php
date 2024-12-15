<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class APISlideController extends Controller
{
    public function slideHienThi(Request $request)
    {
        $data   = Slide::where('tinh_trang', 1)->get();

        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }
}
