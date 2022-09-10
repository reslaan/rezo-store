<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
    use Translatable;

    public $table = "categories";
    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable = ['parent_id','slug','is_active','featured', 'menu','image'];

    // make it hidden to speed query if i don't need it
    protected $hidden = ['translations'];

    protected $casts = [
        'parent_id' => 'integer',
        'is_active' => 'boolean',
        'featured' => 'boolean',
        'menu' => 'boolean',

    ];

    public function translations(): HasMany
    {
        return $this->hasMany(CategoryTranslation::class,'category_id');
    }
    public function products(){
        return $this->belongsToMany(Product::class,'product_categories');
    }
    public function scopeCategories($query){
        return $query->whereNull('parent_id');
    }
    public function scopeSubcategories($query){
        return $query->whereNotNull('parent_id');
    }

    public function active(){
        return $this->is_active == 1 ? __('forms.active') : __('forms.inactive');
    }

    public function parent(){
        return $this->belongsTo(self::class,'parent_id');
    }

    public function children(){

        return  $this->hasMany(self::class,'parent_id');
    }

    public function name(){
        $locale = CategoryTranslation::where('category_id',$this->id)->where('locale',app()->getLocale())->exists();
        if ($this->name != null && $locale != null)
        return $this->name;
    }

    public function photoPath(){
//         $exists = Storage::disk('public')->exists('storage/images/categories/'.$this->image);
//       if (!$this->image || !$exists)
//        return asset('images/image_default.png');

if (Storage::disk('s3')->exists($this->image)) {
    $image =  imagePath($this->image);
    return $image;
}

        // this for local
        return asset('storage/images/categories/'.$this->image);


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
