<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'phone' => 'required|max:11',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điên thoại quá dài',
        ];
    }
}
