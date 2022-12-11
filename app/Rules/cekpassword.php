<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class cekpassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $username;
    public function __construct($username)
    {
        $this->username = $username;
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
        if(str_contains($value,$this->username)){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tidak boleh mengandung username';
    }
}
