<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeletePhimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:phims,id'
        ];
    }

    public function messages()
    {
        return [
            'id.*' => 'Phim này không tồn tại!'
        ];
    }
}
