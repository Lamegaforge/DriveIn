<?php

namespace App\Rules;

use App\Models;
use Illuminate\Contracts\Validation\Rule;

class Token implements Rule
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
        $token = Models\Token::where('value', $value)
            ->free()
            ->count();

        return $token;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Le token n'est pas valide";
    }
}
