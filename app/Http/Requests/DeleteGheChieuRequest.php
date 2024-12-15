<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteGheChieuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:ghe_chieus,id'
        ];
    }

    public function messages()
    {
        return [
            'id.*' => 'Ghế chiếu này không tồn tại!'
        ];
    }
}
