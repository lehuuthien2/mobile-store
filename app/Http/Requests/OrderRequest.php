<?php

namespace mobileS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_name' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'tel' => 'required|digits_between:10,11',
            'note' => 'string|max:255',
            'status' => 'required|numeric'
        ];
        if(request()->method() == 'POST'){
            $rules['status'] = '';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute là bắt buộc.',
            'numeric' => 'Trường :attribute phải là kiểu số.',
            'digits_between' => 'Trường :attribute phải có số ký tự bằng :min hoặc :max'
        ];
    }

    public function attributes()
    {
        $attributes = [
            'user_name' => 'họ và tên',
            'address' => 'địa chỉ',
            'tel' => 'số điện thoại',
            'status' => 'tình trạng'
        ];
        if(request()->method() == 'PUT'){
            $attributes['user_name'] = 'người đặt hàng';
        }
        return $attributes;
    }
}
