<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use Translatable;

    public $table = "attributes";
    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $hidden = ['translations'];

    public function products(){
        return $this->belongsToMany(Product::class,'product_attributes');
    }
    public function options(){
        return $this->hasMany(Option::class,'attribute_id');
    }

}
