<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'document_name' => 'required',
            'document_title' => 'required',
            'lesson_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'document_file_path' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'document_name.required' => 'Tên tài lệu không được để trống',
            'document_title.required' => 'Tiêu đề tài liệu không được để trống',
            'lesson_image.required' => 'Ảnh khóa học không được để trống',
            'lesson_image.mimes' => 'Ảnh phải đúng định dạng',
            'document_file_path.required' => 'Video bài giảng không được để trống',
        ];
    }
}
