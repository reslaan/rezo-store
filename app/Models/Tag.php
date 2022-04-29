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
        return $this->is_active == 1 ? __('admin/forms.active') : __('admin/forms.inactive');
    }
    public function translations(): HasMany
    {
        return $this->hasMany(TagTranslation::class,'tag_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_tags');
    }
}
