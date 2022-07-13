<?php

namespace App\Rules;
use App\Models;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UpdateUniqueValue implements Rule
{

    private $table ;
    private $attributeId;
    private $foreignKey;

    /**
     * Create a new rule instance.
     *
     * @param $table
     * @param $attributeId
     * @param $foreignKey
     */

    public function __construct($table,$attributeId,$foreignKey)
    {
        $this->table = $table;
        $this->attributeId = $attributeId;
        $this->foreignKey = $foreignKey;
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
        // this for update exist item
        if ($this->attributeId){
            if (is_null($this->foreignKey )){
                $attribute = DB::table($this->table)->where($attribute,$value)->where('id','!=',$this->attributeId)->first();
            }else{
                $attribute = DB::table($this->table)->where($attribute,$value)->where($this->foreignKey,'!=',$this->attributeId)->first();
            }
            if ($attribute)
                return false;  // if find attribute value with another id return false
            return true;
        }else{
            // this for create new item
            $attribute = DB::table($this->table)->where($attribute,$value)->first();
            if ($attribute)
                return false;
            return true;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.unique');
    }
}
