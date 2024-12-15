<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuyenRequest extends FormRequest
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
            'ten_quyen'     => "required|min:4",
            'tinh_trang'    => "required"
        ];
    }
    public function messages()
    {
        return [
            'ten_quyen.*'   => "Tên quyền không được để trống!",
            'tinh_trang'    => "Tình trạng không được để trống!"
        ];
    }
}
