<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\FatoorahService;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Redirect;
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
            'CustomerName'       => 'Reslaan Alobeidi',
            'InvoiceValue'       => $request->total_price,
            'DisplayCurrencyIso' => 'SAR',
            'NotificationOption' => 'LNK',
            'CustomerEmail'      => 'test@test.com',
            'CallBackUrl'        => 'https://google.com',
            'ErrorUrl'           => 'https://youtube.com',
            'MobileCountryCode'  => '+966',
            'CustomerMobile'     => '580334498',
            'Language'           => 'ar',
        ];

        try {
            $order = $this->orderRepository->storeOrderDetails($request->all());

            if (!$order) {
                return $this->responseRedirectBack(__('alerts.try_later'), 'error');
            }

            Cart::where('user_id',Auth::user()->id)->delete();

            $response = $this->fatoorahService->sendPayment($data);
            $url = $response['Data']['InvoiceURL'];

            return  Redirect::to($url);
        } catch (InvalidArgumentException $e) {
            return $e;
        };


        return $this->responseRedirect('order.index', __('alerts.ok'), 'success');
    }



    public function paymentCallback(Request $request)
    {

        $data = [];
        $data['key'] = $request->paymentId;
        $data['keyType'] = 'paymentId';

        return $this->fatoorahService->getPaymentStatus($data);
    }
}
