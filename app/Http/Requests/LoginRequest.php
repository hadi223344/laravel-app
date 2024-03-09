<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\PasswordAuth;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UserOrEmail;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'emailOrUser' => ['required ', new UserOrEmail],
            'loginPassword' => ['required', new PasswordAuth($this->getUserAc())]
            //
        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         if ($validator->failed()) return;
    //         // $this->getUserAc();
    //         if (!Hash::check($this->loginPassword,  $this->getUserAc()->password)) {
    //             $validator->errors()->add('loginPassword', 'invalid password');
    //             // return $user;
    //         }
    //     });
    // }
    public function getUserAc()
    {
        return User::where('email', $this->emailOrUser)->orwhere('name', $this->emailOrUser)->first();
    }
}
