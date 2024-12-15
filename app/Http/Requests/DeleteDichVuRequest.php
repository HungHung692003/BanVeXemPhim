<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteDichVuRequest extends FormRequest
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
            'id'      => "required|exists:dich_vus,id",
        ];
    }

    public function messages()
    {
        return [
            'id.*'    => "Dịch vụ không tồn tại!",
        ];
    }
}
