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

    public function cartQuantity(){
        $cart = Cart::where('product_id', $this->id)->where( 'user_id',auth()->user()->id)->first();

        if(!$cart)
        return 1;

        return $cart->quantity;

    }
    public function images(){
        return $this->morphMany(Media::class,'model');
    }

    public function firstImage(){
        $image = $this->images()->pluck('file_name')->first();

        if (!$image)
            return asset('images/image_default.png');

        return asset('storage/images/products/'.$image);
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
