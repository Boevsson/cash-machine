<?php

namespace App\Rules;

use DateTime;
use Illuminate\Contracts\Validation\Rule;

class CardExpirationDateRule implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $date = DateTime::createFromFormat('m/Y', $value);
        $currentDate = date("Y-m-d");

        $interval = date_diff(date_create($date->format('Y-m-d')), date_create($currentDate));
        $months = $interval->format('%m');

        if ($months >= 2) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be at least two months from the current date.';
    }
}
