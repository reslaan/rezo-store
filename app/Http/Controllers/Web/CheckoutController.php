<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class CheckoutController extends BaseController
{

    protected $orderRepository;
    protected $productRepository;

    public function __construct(OrderContract $orderRepository,ProductContract $productRepository){
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }
    public function index(){


        $carts = Auth::user()->carts;
        $totalPrice = 0;

        foreach($carts as $cart){
            $product = $this->productRepository->findById($cart->product_id);
            $totalPrice += $product->price * $cart->quantity;


        }

        return view('web.checkout',compact('totalPrice'));
    }

    public function placeOrder(Request $request){

        $order = $this->orderRepository->storeOrderDetails($request->all());

        if(!$order) {
                 return $this->responseRedirectBack(__('alerts.try_later'), 'error');
        }

        return $this->responseRedirect('order.index',__('alerts.ok'), 'success');
        
    }
}
