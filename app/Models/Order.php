<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['order_number', 'user_id', 'total','status','payment_status','payment_method','address'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
