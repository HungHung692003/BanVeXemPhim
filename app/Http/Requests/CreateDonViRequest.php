<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDonViRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_don_vi'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ten_don_vi.*'    => 'Tên đơn vị không để trống!',
        ];
    }
}
