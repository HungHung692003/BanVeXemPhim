<?php

namespace App\Http\Controllers\API;

use App\Models\Phim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePhimRequest;
use App\Http\Requests\DeletePhimRequest;
use App\Http\Requests\UpdatePhimRequest;
use App\Models\QuyenChucNang;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIPhimController extends Controller
{
    public function store(CreatePhimRequest $request)
    {
        $id_chuc_nang   =   6;
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
            Phim::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới phim thành công!'
            ]);

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function update(UpdatePhimRequest $request)
    {
        $id_chuc_nang   =   11;
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
            $phim   = Phim::find($request->id);
            if($phim) {
                $data   = $request->all();
                $phim->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa phim thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phim không tồn tại!'
                ]);
            }

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function data()
    {
        $id_chuc_nang   =   7;
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

        $data   = Phim::get();

        return response()->json([
            'xxx'    => $data,
        ]);
    }

    public function status(DeletePhimRequest $request)
    {
        $id_chuc_nang   =   8;
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
            $phim   = Phim::find($request->id);
            if($phim) {
                if($phim->hien_thi == 1) {
                    $phim->hien_thi = 0;
                } else {
                    $phim->hien_thi = 1;
                }
                $phim->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phim không tồn tại!'
                ]);
            }

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function info(Request $request)
    {
        $id_chuc_nang   =   9;
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

            $phim   = Phim::find($request->id);
            if($phim) {
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'data'      => $phim
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phim không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function destroy(DeletePhimRequest $request)
    {
        $id_chuc_nang   =   10;
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
            $phim   = Phim::find($request->id);
            if($phim) {
                $phim->delete();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa phim thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phim không tồn tại!'
                ]);
            }

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function phimDangChieu(Request $request)
    {
        $today          = Carbon::today();
        $phimDangChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '<=', $today)
                              ->whereDate('ket_thuc', '>=', $today)
                              ->get();
        return response()->json([
            'status'    => 1,
            'data'      => $phimDangChieu,
        ]);
    }

    public function phimSapChieu(Request $request)
    {
        $today          = Carbon::today();
        $phimSapChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '>', $today)
                              ->get();
        return response()->json([
            'status'    => 1,
            'data'      => $phimSapChieu,
        ]);
    }
}
