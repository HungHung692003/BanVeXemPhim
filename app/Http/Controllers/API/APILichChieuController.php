<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLichChieuRequest;
use App\Http\Requests\DeleteLichChieuRequest;
use App\Http\Requests\UpdateLichChieuRequest;
use App\Models\GheChieu;
use App\Models\LichChieu;
use App\Models\Phim;
use App\Models\PhongChieu;
use App\Models\QuyenChucNang;
use App\Models\VeXemPhim;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class APILichChieuController extends Controller
{
    public function dataDaChieu(Request $request)
    {
        $today          = Carbon::today();
        $data       =   LichChieu::join('phims', 'phims.id', 'lich_chieus.id_phim')
                                 ->join('phong_chieus', 'lich_chieus.id_phong', 'phong_chieus.id')
                                 ->whereDate('lich_chieus.gio_bat_dau', '<', $today)
                                 ->select('lich_chieus.*', 'phims.ten_phim', 'phong_chieus.ten_phong', 'phong_chieus.hang_ngang', 'phong_chieus.hang_doc')
                                 ->get();
        $ds_phim    =   Phim::where('hien_thi', 1)
                            ->where('ket_thuc', '>', $today)
                            ->get();

        $ds_phong   =   PhongChieu::where('tinh_trang', 1)
                                ->get();
        return response()->json([
            'data'      =>  $data,
            'ds_phim'   =>  $ds_phim,
            'ds_phong'  =>  $ds_phong,
        ]);
    }

    public function dataSapChieu(Request $request)
    {
        $today          = Carbon::today();
        $data       =   LichChieu::join('phims', 'phims.id', 'lich_chieus.id_phim')
                                 ->join('phong_chieus', 'lich_chieus.id_phong', 'phong_chieus.id')
                                 ->whereDate('lich_chieus.gio_bat_dau', '>=', $today)
                                 ->select('lich_chieus.*', 'phims.ten_phim', 'phong_chieus.ten_phong', 'phong_chieus.hang_ngang', 'phong_chieus.hang_doc')
                                 ->get();
        $ds_phim    =   Phim::where('hien_thi', 1)
                            ->where('ket_thuc', '>', $today)
                            ->get();

        $ds_phong   =   PhongChieu::where('tinh_trang', 1)
                                ->get();
        return response()->json([
            'data'      =>  $data,
            'ds_phim'   =>  $ds_phim,
            'ds_phong'  =>  $ds_phong,
        ]);
    }

    public function data(Request $request)
    {
        $id_chuc_nang   =   41;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        $data       =   LichChieu::join('phims', 'phims.id', 'lich_chieus.id_phim')
                                 ->join('phong_chieus', 'lich_chieus.id_phong', 'phong_chieus.id')
                                 ->select('lich_chieus.*', 'phims.ten_phim', 'phong_chieus.ten_phong', 'phong_chieus.hang_ngang', 'phong_chieus.hang_doc')
                                 ->get();

        $today      =   Carbon::today();

        $ds_phim    =   Phim::where('hien_thi', 1)
                            ->where('ket_thuc', '>', $today)
                            ->get();

        $ds_phong   =   PhongChieu::where('tinh_trang', 1)
                                  ->get();

        return response()->json([
            'data'      =>  $data,
            'ds_phim'   =>  $ds_phim,
            'ds_phong'  =>  $ds_phong,
        ]);
    }

    public function store(CreateLichChieuRequest $request)
    {
        $id_chuc_nang   =   38;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $data   = $request->all();

            LichChieu::create($data);

            DB::commit();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thêm mới lịch chiếu thành công!',
            ]);
        } catch (Exception $e) {
            Log::error("Ê, nó có lỗi đó tề: " . $e);
            DB::rollBack();
        }
    }

    public function status(DeleteLichChieuRequest $request)
    {
        $id_chuc_nang   =   42;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $lich_chieu     = LichChieu::find($request->id);
            if ($lich_chieu) {
                // Nếu lịch chiếu đang chuyển từ hoạt động  => tạm tắt
                if ($lich_chieu->trang_thai == 1) {
                    // Kiểm tra xem đã có vé nào bán hay chưa?
                    $check  = VeXemPhim::where('id_lich_chieu', $request->id)
                                       ->where('tinh_trang', \App\Models\VeXemPhim::VE_DA_BAN)
                                       ->first();
                    if($check) {
                        return response()->json([
                            'status'    => 0,
                            'message'   => 'Lịch chiếu này đã bán vé cho khách rồi!',
                        ]);
                    }
                    // Phải hủy toàn bộ vé đã tạo ra
                    VeXemPhim::where('id_lich_chieu', $request->id)->delete();

                    $lich_chieu->trang_thai = 0;
                    $lich_chieu->save();

                    DB::commit();

                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đã hủy lịch chiếu phim!',
                    ]);
                } else {
                    $r_gbd      = $request->gio_bat_dau;
                    $r_gkt      = $request->gio_ket_thuc;
                    // a. Kiểm tra lịch chiếu có trùng không?   => Quên đi và ta chưa code
                    $check      =   LichChieu::where('trang_thai', 1)
                                             ->where('id_phong', $request->id_phong)
                                             ->where(function ($query) use ($request) {
                                                $query->where('gio_bat_dau', '>=', $request->gio_bat_dau)
                                                      ->where('gio_ket_thuc', '<=', $request->gio_ket_thuc);
                                                $query->orWhere('gio_bat_dau', '<=', $request->gio_bat_dau)
                                                      ->Where('gio_ket_thuc', '>=', $request->gio_bat_dau);
                                                $query->orWhere('gio_bat_dau', '<=', $request->gio_ket_thuc)
                                                      ->Where('gio_ket_thuc', '>=', $request->gio_ket_thuc);
                                            })
                                            ->first();
                    if($check)  {
                        return response()->json([
                            'status'    => 0,
                            'message'   => 'Phòng chiếu này đã có lịch chiếu!',
                        ]);
                    }
                    // b. Kiểm tra xem phòng chiếu này đã có ghế hay chưa?
                    $gheChieu   =   GheChieu::where('id_phong_chieu', $request->id_phong)->get();

                    if(count($gheChieu) == 0) {
                        return response()->json([
                            'status'    => 0,
                            'message'   => 'Phòng chiếu này không có ghế để bán!',
                        ]);
                    }
                    // c. Tạo ra danh sách ghế để bán. Ví dụ: Phòng 1 có 30 ghế thì ta sẽ tạo ra 30 ghế có thể bán cho lịch chiếu này. Nhưng ở ghế chiếu có trạng thái (0/1)	=> Chúng ta vẫn tạo đủ 30 ghế nhưng chúng ta chỉ bán những ghế có trạng thái = 1
                    foreach($gheChieu as $key => $value) {
                        VeXemPhim::create([
                            'id_lich_chieu'     =>  $request->id,   // Lịch mà ta đang đổi trạng thái
                            'so_ghe'            =>  $value->ten_ghe,
                            'ma_ve'             =>  Str::uuid(),    // sinh ra 1 đoạn mã random 36 ký tự không trùng
                            'gia_ve'            =>  $value->gia_mac_dinh,
                            'tinh_trang'        =>  $value->tinh_trang == 0 ? \App\Models\VeXemPhim::VE_KHONG_THE_BAN : \App\Models\VeXemPhim::VE_CO_THE_BAN,
                        ]);
                    }

                    $lich_chieu->trang_thai = 1;
                    $lich_chieu->save();

                    DB::commit();

                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đã kích hoạt lịch chiếu phim!',
                    ]);
                }
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Lịch chiếu không tồn tại!',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function update(UpdateLichChieuRequest $request)
    {
        $id_chuc_nang   =   39;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $lichChieu   = LichChieu::find($request->id);
            if ($lichChieu) {
                $data   = $request->all();
                $lichChieu->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Lịch chiếu không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function destroy(DeleteLichChieuRequest $request)
    {
        $id_chuc_nang   =   40;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $lichChieu     =   LichChieu::find($request->id);

            if ($lichChieu) {
                // Kiểm tra xem đã có vé nào bán hay chưa?
                $check  = VeXemPhim::where('id_lich_chieu', $request->id)
                                   ->where('tinh_trang', \App\Models\VeXemPhim::VE_DA_BAN)
                                   ->first();
                if($check) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Lịch chiếu này đã bán vé cho khách rồi!',
                    ]);
                }
                // Phải hủy toàn bộ vé đã tạo ra
                VeXemPhim::where('id_lich_chieu', $request->id)->delete();

                $lichChieu->delete();

                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa lịch chiếu thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'lịch chiếu không tồn tại!',
                ]);
            }

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function info(Request $request)
    {
        $id_chuc_nang   =   43;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        $lichChieu  = VeXemPhim::where('id_lich_chieu', $request->id)->get();

        return response()->json([
            'data'    =>  $lichChieu
        ]);
    }

    public function lichChieuTheoFilm(Request $request)
    {
        $now    = Carbon::now();
        // Lấy từ lịch chiếu phim có id = $client gửi lên và hoạt động và chưa chiếu (now < bắt đầu chiếu)
        $data   = LichChieu::where('id_phim', $request->id)
                           ->where('trang_thai', 1)
                           ->where('gio_bat_dau', '>', $now)
                           ->get();

        return response()->json([
            'lich_chieu'    =>  $data,
        ]);
    }

    public function infoLichClient(Request $request)
    {
        $phong_chieu    = PhongChieu::find($request->id_phong);
        $ds_ve          = VeXemPhim::where('id_lich_chieu', $request->id)->get();

        foreach($ds_ve as $k => $v) {
            $v->choose  = 0;
        }

        return response()->json([
            'phong_chieu'   =>  $phong_chieu,
            'ds_ve'         =>  $ds_ve
        ]);
    }
}
