<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class cekterdaftar implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        $datauser = DB::select("select * from user");
        $kembar=false;
        $dtkembar="";
        foreach($datauser as $user){
            if($user->username==$value){
                $kembar=true;
                $dtkembar = $user;
            }
        }

        if($kembar==true){
            if($dtkembar->deleted_at == null) {
                return true;
            }
            else {
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'User not found';
    }
}
