<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable,SoftDeletes;

    protected $table = 'products';
    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['name','description','short_description'];

    protected $fillable = [
        'slug',
        'sku',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'manage_stock',
        'qty',
        'in_stock',
        'is_active',
        'brand_id',
        ];

    // make it hidden to speed query if i don't need it
    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean',
        'in_stock' => 'boolean',
        'manage_stock' => 'boolean',
    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'product_categories');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags');
    }
    public function attributes(){
        return $this->belongsToMany(Attribute::class,'product_attributes');
    }
    public function active(){
        return $this->is_active == 1 ? __('forms.active') : __('forms.inactive');
    }
    public function translations(): HasMany
    {
        return $this->hasMany(ProductTranslation::class,'product_id');
    }
    public function options(){
        return $this->hasMany(Option::class,'product_id');
    }
    public function images(){
        return $this->morphMany(Media::class,'model');
    }
}