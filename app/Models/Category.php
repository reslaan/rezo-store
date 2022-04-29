<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use Translatable;

    public $table = "categories";
    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable = ['parent_id','slug','is_active'];

    // make it hidden to speed query if i don't need it
    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean'
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
        return $this->is_active == 1 ? __('admin/forms.active') : __('admin/forms.inactive');
    }

    public function parent(){
        return $this->belongsTo(self::class,'parent_id');
    }

    public function children(){
        return Category::where('parent_id',$this->id)->get();
    }

    public function name(){
        $locale = CategoryTranslation::where('category_id',$this->id)->where('locale',app()->getLocale())->exists();
        if ($this->name != null && $locale != null)
        return $this->name;
    }


}
