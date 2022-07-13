<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'course_name' => 'required',
            'course_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'course_name.required' => 'Tên khóa học không được để trống',
            'course_image.required' => 'Ảnh khóa học không được để trống',
            'course_image.mimes' => 'Ảnh phải đúng định dạng',
        ];
    }
}
