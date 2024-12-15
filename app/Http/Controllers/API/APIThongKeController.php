<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThongKeRequest;
use App\Models\DanhSachTaiKhoan;
use App\Models\LichChieu;
use App\Models\Phim;
use App\Models\VeXemPhim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIThongKeController extends Controller
{
    public function bt1(Request $request)
    {
        $xxx   =   Phim::join('lich_chieus', 'phims.id', 'lich_chieus.id_phim')
                        ->join('ve_xem_phims', 'lich_chieus.id', 've_xem_phims.id_lich_chieu')
                        ->where('ve_xem_phims.tinh_trang', 1)
                        ->whereDate('ve_xem_phims.created_at', '>=', $request->begin)
                        ->whereDate('ve_xem_phims.created_at', '<=', $request->end)
                        ->select('phims.ten_phim', 'phims.slug_phim', DB::raw('count(ve_xem_phims.id) as so_luong'))
                        ->groupBy('phims.ten_phim', 'phims.slug_phim')
                        ->get();

        $arr_1  =   [];
        $arr_2  =   [];

        foreach($xxx as $key => $v) {
            array_push($arr_1, $v->ten_phim);
            array_push($arr_2, $v->so_luong);
        }

        return response()->json([
            'status'    => 1,
            'data'      => $arr_2,  // chứa số lượng
            'labels'    => $arr_1,  // chứa tên phim
        ]);
    }

    public function bt2(ThongKeRequest $request)
    {
        $xxx   =  VeXemPhim::select(
                                DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as ngay"),
                                DB::raw("SUM(gia_ve) as tong_tien")
                            )
                            ->whereDate('ve_xem_phims.created_at', '>=', $request->begin)
                            ->whereDate('ve_xem_phims.created_at', '<=', $request->end)
                            ->groupBy('ngay')
                            ->get();
        $arr_1  =   [];
        $arr_2  =   [];

        foreach($xxx as $key => $v) {
            array_push($arr_1, $v->ngay);
            array_push($arr_2, $v->tong_tien);
        }

        return response()->json([
            'status'    => 1,
            'data'      => $arr_2,  // chứa số lượng
            'labels'    => $arr_1,  // chứa tên phim
        ]);
    }

    public function bt3(ThongKeRequest $request)
    {
        $xxx = DanhSachTaiKhoan::join('don_hangs', 'don_hangs.id_khach_hang', 'danh_sach_tai_khoans.id')
                                ->join('ve_xem_phims', 've_xem_phims.id_don_hang', 'don_hangs.ma_don_hang')
                                ->whereDate('ve_xem_phims.created_at','>=', $request->begin)
                                ->whereDate('ve_xem_phims.created_at','<=', $request->end)
                                ->select('danh_sach_tai_khoans.email', DB::raw('count(ve_xem_phims.id) as so_lan'))
                                ->groupBy('danh_sach_tai_khoans.email')
                                ->orderByDESC('so_lan')
                                ->take(5)
                                ->get();
        $arr_1  =   [];
        $arr_2  =   [];

        foreach($xxx as $key => $v) {
            array_push($arr_1, $v->email);
            array_push($arr_2, $v->so_lan);
        }

        return response()->json([
            'status'    => 1,
            'labels'    => $arr_1,  // chứa tên phim
            'data'      => $arr_2,  // chứa số lượng
        ]);
    }


    public function bt4(ThongKeRequest $request)
    {
        $xxx   =  Phim::join('lich_chieus', 'phims.id', 'lich_chieus.id_phim')
                      ->select('phims.ten_phim', DB::raw('count(lich_chieus.id) as so_lan'))
                      ->whereDate('lich_chieus.gio_bat_dau','>=', $request->begin)
                      ->whereDate('lich_chieus.gio_bat_dau','<=', $request->end)
                      ->groupBy('phims.ten_phim')
                      ->get();
        $arr_1  =   [];
        $arr_2  =   [];

        foreach($xxx as $key => $v) {
            array_push($arr_1, $v->ten_phim);
            array_push($arr_2, $v->so_lan);
        }

        return response()->json([
            'status'    => 1,
            'labels'    => $arr_1,  // chứa tên phim
            'data'      => $arr_2,  // chứa số lượng
        ]);
    }

    public function bt5(ThongKeRequest $request)
    {
        $xxx   =  LichChieu::join('phong_chieus', 'phong_chieus.id', 'lich_chieus.id_phong')
                            ->whereDate('lich_chieus.gio_bat_dau','>=', $request->begin)
                            ->whereDate('lich_chieus.gio_bat_dau','<=', $request->end)
                            ->select('phong_chieus.ten_phong', DB::raw('count(phong_chieus.id) as so_lan'))
                            ->groupBy('phong_chieus.ten_phong')
                            ->get();
        $arr_1  =   [];
        $arr_2  =   [];

        foreach($xxx as $key => $v) {
            array_push($arr_1, $v->ten_phong);
            array_push($arr_2, $v->so_lan);
        }

        return response()->json([
            'status'    => 1,
            'labels'    => $arr_1,  // chứa tên phim
            'data'      => $arr_2,  // chứa số lượng
        ]);
    }
}
