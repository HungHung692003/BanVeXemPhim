<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGheChieuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:ghe_chieus,id',
            'gia_mac_dinh'          => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'id'                      => 'Ghế chiếu không tồn tại!',
            'gia_mac_dinh.*'          => 'Giá ghế yêu cầu không để trống!',
        ];
    }
}
