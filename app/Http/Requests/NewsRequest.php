<?php

namespace mobileS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255|unique:news,title',
            'summary' => 'string',
            'body' => 'required',
            'thumbnail' => 'required|max:8192|image'
        ];
        if(request()->method() == 'PUT'){
            $rules['title'] = 'required|max:255|unique:users,title,' . request()->input('news_id') . ',news_id';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute là bắt buộc.',
            'unique' => 'Trường :attribute đã bị trùng.',
            'string' => 'Trường :attribute phải là kiểu chuỗi'
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'tiêu đề',
            'summary' => 'tóm tắt',
            'body' => 'bài viết',
            'thumbnail' => 'ảnh đại diện'
        ];
    }
}
