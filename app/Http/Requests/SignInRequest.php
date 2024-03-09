<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rules\Password;

class SignInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public $user = [];
    public $email = [];
    public $password = [];

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required ', 'unique:users,name'],
            'email' => 'required | email | unique:users,email',
            'SigninPassword' => [
                'required ', Password::min(2)
                    ->letters()
                // ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised(3)
                , 'confirmed'
            ],
            'SigninPassword_confirmation' => ['required']
            // 'password_confirmation' => ['required', 'same:password']
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'username.required' => 'u.r',
    //         // 'username' . 'unique:users,name' => 'this username is taken',
    //         // 'email' . 'unique:users,email' => 'this email is taken'
    //     ];

    //     // }
    //     // $messages = ['username'.Rule::notIn($this->user) => 'this username is taken';
    // }
}
