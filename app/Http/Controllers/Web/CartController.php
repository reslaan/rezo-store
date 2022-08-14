<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class CartController extends Controller
{
    protected $productRepository;   // the product repository instances

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
        $this->middleware('auth');
    }



    public function index(){

        $cart = auth()->user()->carts;
        $products_id = $cart->pluck('product_id');
        $products = Product::find($products_id);
     return view('web.cart',compact('products'));
    }





    public function addToCart(Request $request){

       $cartIds = auth()->user()->carts->pluck('product_id');


         if(!in_array($request->id, $cartIds->toArray())){
            $product = $this->productRepository->findById($request->id);

            $cart = new Cart();
            $cart->create([
                 'user_id' => auth()->user()->id,
                'product_id' => $product->id,

            ]);
            $cartCount = auth()->user()->carts->count();
               return response()->json(['success' => true, 'message' => 'Product was successfully Added','cartCount' => $cartCount + 1], 200);
         }else{
            return response()->json(['success' => false, 'message' => 'Product Already In Cart' ], 404);

         }


    }

    public function updateQuantity(Request $request){
        $cart = Cart::where('product_id', $request->product_id )->where( 'user_id',auth()->user()->id)->first();

        if(!$cart)
            return response()->json(['success' => false,'message' => __('alerts.try_later')], 404);

            $cart->quantity = $request->quantity;
            $cart->save();

        return response()->json(['success' => true, 'message' => 'Product was successfully Added'], 200);


    }

    public function delete($id) {
        $cart = Cart::where('product_id', $id)->first();
        $cart->delete();
        return redirect()->route('cart');
    }
}
