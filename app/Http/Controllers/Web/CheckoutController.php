<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\FatoorahService;
use App\Http\Controllers\BaseController;
use Webmozart\Assert\InvalidArgumentException;

class CheckoutController extends BaseController
{

    protected $orderRepository;
    protected $productRepository;
    protected $fatoorahService;

    public function __construct(OrderContract $orderRepository, ProductContract $productRepository, FatoorahService $fatoorahService)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->fatoorahService = $fatoorahService;
    }
    public function index()
    {


        $carts = Auth::user()->carts;
        $totalPrice = 0;

        foreach ($carts as $cart) {
            $product = $this->productRepository->findById($cart->product_id);
            $totalPrice += $product->price * $cart->quantity;
        }

        return view('web.checkout', compact('totalPrice'));
    }

    public function placeOrder(Request $request)
    {

        $data = [
            'CustomerName'       => 'FName LName',
            'InvoiceValue'       => 10,
            'DisplayCurrencyIso' => 'KWD',
            'NotificationOption' => 'LNK',
            'CustomerEmail'      => 'test@test.com',
            'CallBackUrl'        => 'https://google.com',
            'ErrorUrl'           => 'https://youtube.com',
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => '1234567890',
            'Language'           => 'en',
        ];

        try {


      return    $this->fatoorahService->sendPayment($data);
        }catch (InvalidArgumentException $e) {
            return $e;
        };

        $order = $this->orderRepository->storeOrderDetails($request->all());

        if (!$order) {
            return $this->responseRedirectBack(__('alerts.try_later'), 'error');
        }

        return $this->responseRedirect('order.index', __('alerts.ok'), 'success');
    }
}
