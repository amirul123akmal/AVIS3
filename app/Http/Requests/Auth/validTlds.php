<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;

class ValidTlds implements ValidationRule
{
    public function validate($attribute, $value, \Closure $fail): void
    {
        $domain = substr(strrchr($value, "@"), 1); // get domain part
        $parts = explode('.', $domain);
        $tld = strtolower(array_pop($parts)); // get last part as TLD

        if (!in_array($tld, config('constants.valid_tlds'))) {
            $fail('The :attribute must have a valid top-level domain.');
        }
    }
}
