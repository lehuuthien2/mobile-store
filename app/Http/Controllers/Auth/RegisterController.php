<?php

namespace mobileS\Http\Controllers\Auth;

use mobileS\User;
use mobileS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guests');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:20|unique:users',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|max:255|unique:users',
            'name' => 'required|max:255',
            'tel' => 'required|digits_between:10,11',
            'address' => 'required|max:255',
        ],
            [
                'required' => 'Trường :attribute là bắt buộc',
                'max' => 'Trường :attribute có tối đa :max ký tự',
                'min' => 'Trường :attribute phải có tối thiểu :min ký tự',
                'unique' => 'Trường :attribute đã bị trùng',
                'email' => 'Trường :attribute phải là kiểu email',
                'digits_between' => 'Trường :attribute phải có số ký tự là 10 hoặc 11'
            ],
            [
                'name' => 'họ và tên',
                'tel' => 'số điện thoại',
                'address' => 'địa chỉ'
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \mobileS\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'name' => $data['name'],
            'tel' => $data['tel'],
            'address' => $data['address'],
        ]);
    }
}
