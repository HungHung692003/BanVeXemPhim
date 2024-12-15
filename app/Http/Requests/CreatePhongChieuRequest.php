<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePhongChieuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_phong'             => 'required|min:6',
            'loai_may_chieu'        => 'required|min:6',
            'hang_ngang'            => 'required|numeric',
            'hang_doc'              => 'required|numeric',
            'tinh_trang'            => 'required|',
            'loai_phong'            => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'ten_phong.required'          => 'Tên phòng yêu cầu không để trống!',
            'ten_phong.min'               => 'Tên phòng phải từ 6 ký tự trở lên!',
            'loai_may_chieu.required'     => 'Tên phòng yêu cầu không để trống!',
            'loai_may_chieu.min'          => 'Tên phòng phải từ 6 ký tự trở lên!',
            'hang_ngang.*'                => 'Hàng ngang yêu cầu không để trống!',
            'hang_doc.*'                  => 'Hàng dọc yêu cầu không để trống!',
            'tinh_trang.*'                => 'Tình trạng yêu cầu không để trống!',
            'loai_phong.*'                => 'Loại phòng yêu cầu không để trống!',
        ];
    }
}
