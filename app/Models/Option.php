<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

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
}
