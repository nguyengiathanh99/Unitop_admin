<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'lesson_name' => 'required',
            'lesson_time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'lesson_name.required' => 'Tên bài học không được để trống',
            'lesson_time.required' => 'Thời gian không được để trống',
        ];
    }
}
