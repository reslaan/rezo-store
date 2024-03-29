<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use Translatable;

    public $table = "brands";
    // The relation to eager load on every query
    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable = ['photo','is_active'];

    // make it hidden to speed query if i don't need it
    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function active(){
        return $this->is_active == 1 ? __('forms.active') : __('forms.inactive');
    }
    public function photoPath(){
        if (!$this->photo)
            return asset('images/image_default.png');

            if (Storage::disk('s3')->exists($this->photo)) {
                $image =  imagePath($this->photo);
                return $image;
            }

       // return asset('storage/images/brands/'.$this->photo);
    }
    public function translations(): HasMany
    {
        return $this->hasMany(BrandTranslation::class,'brand_id');
    }


}
