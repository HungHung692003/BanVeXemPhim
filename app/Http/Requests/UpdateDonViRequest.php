<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDonViRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'            => 'required|exists:don_vis,id',
            'ten_don_vi'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.*'            => 'Đơn vị không tồn tại!',
            'ten_don_vi.*'    => 'Tên đơn vị không để trống!',
        ];
    }
}
