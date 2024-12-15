<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\VeXemPhim;
use Illuminate\Http\Request;

class APIDonHangController extends Controller
{
    public function dataDonHang(Request $request)
    {
        $data = DonHang::join('danh_sach_tai_khoans', 'don_hangs.id_khach_hang', 'danh_sach_tai_khoans.id')
                        ->select('don_hangs.*', 'danh_sach_tai_khoans.ho_va_ten')
                        ->get();
        return response()->json([
            'data'  => $data,
        ]);
    }

    public function dataChiTietDonHang(Request $request)
    {
        $data = VeXemPhim::join('don_hangs', 've_xem_phims.id_don_hang', 'don_hangs.ma_don_hang')
                         ->join('lich_chieus', 've_xem_phims.id_lich_chieu', 'lich_chieus.id')
                         ->join('phims', 'lich_chieus.id_phim', 'phims.id')
                         ->where('don_hangs.id_khach_hang', $request->id_khach_hang)
                         ->where('ve_xem_phims.id_don_hang', $request->ma_don_hang)
                         ->select('ve_xem_phims.*', 'phims.ten_phim')
                         ->get();
        return response()->json([
            'data'  => $data,
        ]);
    }
}
