<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuyenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'             => "required|exists:phan_quyens,id",
            'ten_quyen'      => "required|min:4",
            'tinh_trang'     => "required"
        ];
    }

    public function messages()
    {
        return [
            'id'             => "Quyền không tồn tại!",
            'ten_quyen.*'    => "Tên quyền không được để trống!",
            'tinh_trang'     => "Tình trạng không được để trống!"
        ];
    }
}
