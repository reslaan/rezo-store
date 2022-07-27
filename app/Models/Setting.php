<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable;

    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['value'];

    protected $fillable = ['key','is_translatable','plain_value'];

    protected $casts = [
        'is_translatable' => 'boolean'
    ];

    /*
     * set the given setting
     *
     * @param array $setting
     * @return void
     */
    public static function setMany($setting){
        foreach ($setting as $key => $value){
            self::set($key , $value);
        }
    }


    /*
     * set the given setting
     *
     * @param String $key
     * @param mixed $value
     * @return void
     */

    public static function set($key , $value){
        if ($key === 'translatable'){
            return static::setTranslatableSettings($value);
        }
        if (is_array($value)){
            $value = json_encode($value);
        }
        static::updateOrCreate(['key'=>$key],['plain_value'=>$value]);
    }


    /*
     * set the given setting
     *
     * @param array $setting
     * @return void
     */
    public static function setTranslatableSettings($setting = []){
        foreach ($setting as $key => $value){
            static::updateOrCreate(['key'=>$key],[
                'is_translatable' => true,
                'value' => $value,
            ]);
        }
    }

}
