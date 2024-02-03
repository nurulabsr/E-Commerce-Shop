<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaNumSpacesPunctuation implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the value contains only letters, numbers, spaces, and specific punctuation marks
        return preg_match('/^(?!_)(?!.*_)$|^[\p{L}\p{N}\s\-.,:;!?()&%$@#*\'"\[\]{}|\\\\\/]+$/u', $value);
    }

    public function message()
    {
        return 'The :attribute may only contain letters, numbers, spaces, and specific punctuation marks.';
    }
}
