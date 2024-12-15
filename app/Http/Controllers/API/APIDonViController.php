<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDonViRequest;
use App\Http\Requests\DeleteDonViRequest;
use App\Http\Requests\UpdateDonViRequest;
use App\Models\DonVi;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIDonViController extends Controller
{
    public function store(CreateDonViRequest $request)
    {
        $id_chuc_nang   =   34;
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

            DonVi::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới đơn vị thành công!'
            ]);
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function update(UpdateDonViRequest $request)
    {
        $id_chuc_nang   =   37;
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

            $Don_vi   = DonVi::find($request->id);
            if($Don_vi) {
                $data   = $request->all();
                $Don_vi->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Đơn vị không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function data()
    {
        $id_chuc_nang   =   35;
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

        $data   = DonVi::get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function destroy(DeleteDonViRequest $request)
    {
        $id_chuc_nang   =   36;
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
            $Don_vi     =   DonVi::find($request->id);

            if($Don_vi) {
                $Don_vi->delete();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa đơn vị thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Đơn vị không tồn tại!',
                ]);
            }

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

}
