<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class PasswordAuth implements ValidationRule
{
    public $user;
    public function __construct(?User $user)
    {
        $this->user = $user;
    }
    /**
     * Run the validation rule.
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // if(!$value) $fail('password is required')
        if (!$this->user) {
            $fail('first cheak user');
            return;
        };
        if (!Hash::check($value,  $this->user->password)) {
            $fail('password is wrong');
        }
    }
}
