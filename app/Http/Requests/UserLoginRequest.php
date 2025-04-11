<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use App\Http\Requests\UserLoginRequest;

class UserLoginRequest extends FormRequest
{
    public $user_id;
    public function authorize(): bool
    {
        return true;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8'
        ];

        // bài 1:
        // return [
        //     'name' => 'required|max:100',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:8|confirmed',
        // ];


        // bài 2
        // return [
        //     'email' => 'required|email|unique:users,email,' . 
        //     $this->user_id,
        //     'age' => 'nullable|integer|min:18|max|100',
        //     'avatar' => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        // ];

        // bài 3
        // return [
        //     'is_shipping_address_same' => 'required|boolean',
        //     'shipping_address' => 'required_if:is_shipping_address_same, true'
        // ];

        // bài 4
        // return [
        //     'user_id' => 'required|exists:users,id',
        //     'vote_star' => 'required|integer|min:1|max:5',
        //     'feedback' => 'required|string|min:50|max:500'
        // ];

        // bài 5
        // return [
        //     'name' => 'required|string|min:5|max:20',
        //     'birth_day' => 'required|date_format:d/m/Y',
        //     'province' => 'string|nullable',
        //     'district' => 'string|required_if:is_province, !null'
        // ];

        // bài 6
        // return [
        //     'username' => 'required|unique:users,username',
        //     'phone_number' => 'nullable|regex:/^(\+?[\d\s\-()]{7,15})$/'
        // ];
    }

    public function messages(): array
    {  
        return [
            'email.required' => 'Không được để trống email',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email chưa được đăng ký',
            'password.required' => 'Không được để trống password',
            'password.string' => 'Password không phải là chuỗi',
            'password.min' => 'Password phải có ít nhất 8 ký tự'
        ];
    }
}
