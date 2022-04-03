<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable = ['parent_id','slug','is_active'];

    // make it hidden to speed query if i don't need it
    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeCategories($query){
        return $query->whereNull('parent_id');
    }
    public function scopeSubcategories($query){
        return $query->whereNotNull('parent_id');
    }

    public function active(){
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function parent(){
        return $this->belongsTo(self::class,'parent_id');
    }



}
