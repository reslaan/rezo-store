<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductOption extends Model
{
    protected $table = 'product_options';

    protected $fillable = [
        'price',
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class,'product_options');
    }
}
