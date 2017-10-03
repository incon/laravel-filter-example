<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PriceValidationRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($attribute === "price_max" && request('price_min')) {
            return $value >= request('price_min');
        }

        if ($attribute === "price_min" && request('price_max')) {
            return $value <= request('price_max');
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The price max must be equal to or greater than the price min.';
    }
}
