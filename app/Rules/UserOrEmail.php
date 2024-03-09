<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
 
class UserOrEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Hash::check($req->loginPassword, $user->password);
        if ( !(User::where('name', $value)->first() or User::where('email', $value)->first() )  ) {
            $fail('The :attribute is invalid');
        }
    }
}
