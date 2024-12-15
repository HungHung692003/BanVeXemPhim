<?php

namespace App\Http\Controllers;

use App\Models\LichChieu;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrangChuController extends Controller
{
    public function index()
    {
        $today          = Carbon::today();
        $phimDangChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '<=', $today)
                              ->whereDate('ket_thuc', '>=', $today)
                              ->get();

        $phimSapChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '>', $today)
                              ->get();

        return view('client.page.homepage', compact('phimDangChieu', 'phimSapChieu'));
    }

    public function detailPhim()
    {
        return view('client.page.film-detail');
    }

    public function viewPhimDangChieu()
    {
        $today          = Carbon::today();
        $phim           = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '<=', $today)
                              ->whereDate('ket_thuc', '>=', $today)
                              ->paginate(4);
        // dd($phim->toArray());
        return view('client.page.phim_dang_chieu', compact('phim'));
    }

    public function viewPhimSapChieu()
    {
        $today          = Carbon::today();
        $phim = Phim::where('hien_thi', 1)
                    ->whereDate('bat_dau', '>', $today)
                    ->get();
        return view('client.page.phim_sap_chieu' , compact('phim'));
    }

    public function viewBaiViet()
    {
        return view('client.page.bai_viet');
    }

    public function viewLienHe()
    {
        return view('client.page.lien_he');
    }
}
