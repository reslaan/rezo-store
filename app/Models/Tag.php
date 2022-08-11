<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use Translatable;

    public $table = "tags";
    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable = ['slug','is_active'];

    // make it hidden to speed query if i don't need it
    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function active(){
        return $this->is_active == 1 ? __('forms.active') : __('forms.inactive');
    }
    public function translations(): HasMany
    {
        return $this->hasMany(TagTranslation::class,'tag_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_tags');
    }

    public function setSlugAttribute($value){

        $separator = '-';
        $value = trim($value);

        $value = mb_strtolower($value, "UTF-8");;

        $value = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $value);

        $value = preg_replace("/[\s-]+/", " ", $value);

        $value = preg_replace("/[\s_]/", $separator, $value);
        $this->attributes['slug'] = $value;

    }
}
