<?php
namespace App\Contracts;



use Illuminate\Http\Request;

interface OrderContract
{
    public function storeOrderDetails($params);

    
}
