<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThongKeRequest extends FormRequest
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
            'begin' => "required",
            'end'   => "required|after_or_equal:begin",
        ];
    }
    public function messages()
    {
        return [
            'begin.*' => "Ngày bắt đầu không được để trống!",
            'end.*'   => "Ngày kết thúc không được bé hơn ngày bắt đầu!",
        ];
    }
}
