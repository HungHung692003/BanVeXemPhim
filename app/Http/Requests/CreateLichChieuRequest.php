<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLichChieuRequest extends FormRequest
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
            'id_phim'                => 'required|exists:phims,id',
            'id_phong'               => 'required|exists:phong_chieus,id',
            'gio_bat_dau'            => 'required',
            'gio_ket_thuc'           => 'required|after_or_equal:gio_bat_dau',
            'trang_thai'             => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id_phim.*'                => 'Phim không tồn tại!',
            'id_phong.*'               => 'Phòng chiếu không tồn tại!',
            'gio_bat_dau.*'            => 'Giờ bắt đầu không được để trống!',
            'gio_ket_thuc.*'           => 'Giờ kết thúc phải lớn hơn giờ bắt đầu!',
            'trang_thai.*'             => 'Tình trạng không được để trống!',
        ];
    }
}
