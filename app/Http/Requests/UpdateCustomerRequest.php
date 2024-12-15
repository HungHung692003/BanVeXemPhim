<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:danh_sach_tai_khoans,id',
            'email'                 => 'required|email|unique:danh_sach_tai_khoans,email,'. $this->id,
            'so_dien_thoai'         => 'required|numeric|digits:10',
            'ngay_sinh'             => 'required|date',
            'dia_chi'               => 'required|min:7|max:100',
            'ho_va_ten'             => 'required|min:4|max:100',
            'is_block'              => 'required|'  ,
            'tinh_trang'            => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                      =>  'Tài khoản không tồn tại!',
            'email.required'	        =>  'Email yêu cầu phải nhập!',
            'email.email'	            =>  'Email không đúng định dạng!',
            'email.unique'	            =>  'Email đã tồn tại trong hệ thống!',
            'ho_va_ten.*'               =>  'Họ và tên yêu cầu phải từ 6 đến 30 ký tự!',
            'ngay_sinh.required'        =>  'Ngày Sinh yêu cầu phải nhập!',
            'dia_chi.*'                 =>  'Quê quán yêu cầu phải từ 7 đến 100 ký tự!',
            'so_dien_thoai.*'           =>  'Số điện thoại phải là một dãy có 10 chữ số!',
            'is_block.*'                =>  'Yêu cầu trạng thái không được bỏ trống!',
            'tinh_trang.*'              =>  'Yêu cầu tình trạng không được bỏ trống!',
        ];
    }
}
