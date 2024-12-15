<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:admins,id'
        ];
    }

    public function messages()
    {
        return [
            'id.*' => 'Admin này không tồn tại!'
        ];
    }
}
