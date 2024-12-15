<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDichVuRequest;
use App\Http\Requests\DeleteDichVuRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\DichVu;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIDichVuController extends Controller
{
    public function store(CreateDichVuRequest $request)
    {
        $id_chuc_nang   =   29;
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

            DichVu::create($data);
            DB::commit();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thêm mới dịch vụ thành công!',
            ]);
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function data(Request $request)
    {
        $id_chuc_nang   =   30;
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

        $data   = DichVu::all();

        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }

    public function destroy(DeleteDichVuRequest $request)
    {
        $id_chuc_nang   =   31;
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

            $dichVu     =   DichVu::find($request->id);

            if($dichVu) {
                $dichVu->delete();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa dịch vụ thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Dịch vụ không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function update(UpdateAdminRequest $request)
    {
        $id_chuc_nang   =   32;
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

            $dichVu     =   DichVu::find($request->id);
            if($dichVu) {
                $data   = $request->all();
                $dichVu->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật dịch vụ thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Dịch vụ không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function status(DeleteDichVuRequest $request)
    {
        $id_chuc_nang   =   33;
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
            $dichVu     =   DichVu::find($request->id);
            if($dichVu) {
                $dichVu->tinh_trang     =   $dichVu->tinh_trang == 1 ? 0 : 1;
                $dichVu->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật dịch vụ thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Dịch vụ không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
