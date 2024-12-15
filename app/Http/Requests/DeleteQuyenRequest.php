<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteQuyenRequest extends FormRequest
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
            'id'        => "required|exists:phan_quyens,id"
        ];
    }
    public function messages()
    {
        return [
            'id.*'      => 'Quyền không tồn tại!',
        ];
    }
}
