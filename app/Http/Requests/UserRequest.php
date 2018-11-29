<?php

namespace mobileS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'username' => 'required|max:20|unique:users,username',
            'password' => 'required|max:255|confirmed',
            'name' => 'required:max:50',
            'birthday' => 'required|date_format:"Y-m-d',
            'gender' => 'required',
            'tel' => 'required|max:11',
            'email' => 'required|max:255|unique:users,email',
            'address' => 'required|max:255',
            'avatar' => 'image|max:3072'
        ];
        if(request()->method() == 'PUT'){
            $rules['username'] = 'required|max:20|unique:users,username,' . request()->input('user_id') . ',user_id';
            $rules['email'] = 'required|max:255|unique:users,email,' . request()->input('user_id') . ',user_id';
        }
        if(Auth::user()->permission == 1){
            $rules['password'] = 'max:255|confirmed';
            $rules['birthday'] = 'date_format:"Y-m-d';
            $rules['gender'] = '';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute là bắt buộc.',
            'unique' => 'Trường :attribute đã bị trùng.',
            'numeric' => 'Trường :attribute phải là kiểu số.',
            'date_format' => 'Trường :attribute phải thuộc định dạng "Y-m-d"',
            'regex' => 'Trường :attribute định dạng không đúng.',
            'currency_size' => 'Trường :attribute độ dài phải lớn hơn :min và nhỏ hơn :max.',
            'confirmed' => 'Mật khẩu xác nhận không chính xác'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'họ và tên',
            'address' => 'địa chỉ',
            'tel' => 'số điện thoại',
            'total' => 'tổng tiền',
            'gender' => 'giới tính',
            'birthday' => 'ngày sinh',
        ];
    }
}
