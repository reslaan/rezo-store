<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Models\Order;

class SettingController extends BaseController
{
    public function index() {
        $orders =  Auth::user()->orders;
        $this->setPageTitle('Settings','list user settings');
        return view('web.settings.index',compact('orders'));
    }

    public function orderItems($id){
        $this->setPageTitle('Settings','list user settings');
       $items =  Order::findOrFail($id)->items;
       return view('web.settings.orderItems',compact('items'));

    }
}
