<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    use Translatable;

    public $table = "options";
    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $hidden = ['translations'];

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function translations(): HasMany
    {
        return $this->hasMany(OptionTranslation::class,'option_id');
    }
}
