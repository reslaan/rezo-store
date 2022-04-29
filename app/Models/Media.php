<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['model_id','model_type','file_name','size'];

    public function model(){
        return $this->morphTo();
    }
    public function path($folder){
        return asset('storage/images/'.$folder.'/'.$this->file_name);
    }
}
