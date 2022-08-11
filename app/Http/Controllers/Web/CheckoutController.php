<?php

namespace App\Http\Controllers\Web;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    protected $orderRepository;

    public function __construct(OrderContract $orderRepository){
        $this->orderRepository = $orderRepository;
    }
    public function index(){
        return view('web.checkout');
    }

    public function placeOrder(Request $request){
        $order = $this->orderRepository->storeOrderDetails($request->all());

        dd($order);
    }
}
