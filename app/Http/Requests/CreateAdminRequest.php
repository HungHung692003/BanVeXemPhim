<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username'            => 'required|min:4|max:50'  ,
            'email'               => 'required|email|unique:admins,email',
            'password'            => 'required|min:4|max:30'  ,
            'ho_va_ten'           => 'required|min:4|max:100',
            'id_quyen'            => 'required|'  ,
            'ngay_sinh'           => 'required|date',
            'que_quan'            => 'required|min:7|max:100',
            'so_dien_thoai'       => 'required|numeric|digits:10',
            'gioi_tinh'           => 'required|numeric|between:0,1'  ,
            'cccd'                => 'required|digits:12'  ,
            'is_block'            => 'required|'  ,
        ];
    }

    public function messages()
    {
        return [
            'email.required'	        =>  'Email yêu cầu phải nhập!',
            'email.email'	            =>  'Email không đúng định dạng!',
            'email.unique'	            =>  'Email đã tồn tại trong hệ thống!',
            'password.*'                =>  'Password yêu cầu phải từ 6 đến 30 ký tự!',
            'ho_va_ten.*'               =>  'Họ và tên yêu cầu phải từ 6 đến 30 ký tự!',
            'id_quyen.*'                =>  'Quyền yêu cầu phải nhập!',
            'ngay_sinh.required'        =>  'Ngày Sinh yêu cầu phải nhập!',
            'ngay_sinh.date'            =>  'Ngày Sinh yêu cầu phải đúng định dạng!',
            'que_quan.*'                =>  'Quê quán yêu cầu phải từ 7 đến 100 ký tự!',
            'so_dien_thoai.*'           =>  'Số điện thoại phải là một dãy có 10 chữ số!',
            'gioi_tinh.*'               =>  'Giới tính phải chọn đúng theo yêu cầu!',
            'cccd.*'                    =>  'CCCD phải là một dãy có 12 chữ số!',
            'is_block.*'                =>  'Yêu cầu trạng thái không được bỏ trống!',
        ];
    }
}
