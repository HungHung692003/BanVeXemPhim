<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGheChieuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'gia_mac_dinh'          => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'gia_mac_dinh.*'          => 'Giá ghế yêu cầu không để trống!',
        ];
    }
}
