<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeletePhongChieuRequest extends FormRequest
{public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:phong_chieus,id'
        ];
    }

    public function messages()
    {
        return [
            'id.*' => 'Phòng chiếu này không tồn tại!'
        ];
    }
}
