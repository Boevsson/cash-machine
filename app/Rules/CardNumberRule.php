<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CardNumberRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strlen($value) === 16 && str_starts_with($value, '4');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be 16 digits and start with 4.';
    }
}
