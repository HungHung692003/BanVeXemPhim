<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDichVuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'id'              =>"required|exists:dich_vus,id",
            'ten_dich_vu'     =>"required|min:5",
            'mo_ta'           =>"required|min:20",
            'hinh_anh'        =>"required",
            'gia_ban'         =>"required|numeric",
            'tinh_trang'      =>"required",
            'id_don_vi'       =>"required",
        ];
    }
    public function messages()
    {
        return [
            'id.*'              =>"Dịch vụ không tồn tại!",
            'ten_dich_vu.*'     =>"Tên dịch vụ không được để trống!",
            'mo_ta.*'           =>"Mô tả phải lớn hơn 20 ký tự!",
            'hinh_anh.*'        =>"Hình ảnh không được để trống",
            'gia_ban.*'         =>"Giá bán không được để trống!",
            'tinh_trang.*'      =>"Tình Trạng không được để trống!",
            'id_don_vi.*'       =>"Đơn vị không được để trống!",
        ];
    }
}
