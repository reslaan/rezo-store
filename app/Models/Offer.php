<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['code', 'type', 'discount', 'description', 'is_active', 'start_date', 'end_date'];



    public const TYPE = [
        0 => 'ثابت',
        1 => 'نسبة',
    ];

//    public function setTypeAttribute($val)
//    {
//        $val == self::TYPE[0] ? $this->attributes['type'] = 0 : $this->attributes['type'] = 1;
//
//    }

    public function getTypeAttribute($val): string
    {
        $val == 0 ? $val = self::TYPE[0] : $val = self::TYPE[1];
        return $val;
    }

    public function setCodeAttribute($value){
        $this->attributes['code'] = strtoupper($value);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'offer_products');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_offers');
    }

    public function active()
    {
        return $this->is_active == 1 ? __('forms.active') : __('forms.inactive');
    }
}
