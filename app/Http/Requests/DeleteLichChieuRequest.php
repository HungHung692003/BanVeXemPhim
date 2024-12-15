<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteLichChieuRequest extends FormRequest
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
            'id'        => "required|exists:lich_chieus,id"
        ];
    }
    public function messages()
    {
        return [
            'id.*'      => 'Lịch chiếu không tồn tại!',
        ];
    }
}
