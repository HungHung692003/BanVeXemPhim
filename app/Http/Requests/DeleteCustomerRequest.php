<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:danh_sach_tai_khoans,id'
        ];
    }

    public function messages()
    {
        return [
            'id.*' => 'Tài khoản này không tồn tại!'
        ];
    }
}
