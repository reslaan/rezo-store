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

        $cart = auth()->user()->cart;
        $products_id = $cart->pluck('product_id');
        $products = Product::find($products_id);
     return view('web.cart',compact('products'));
    }





    public function addToCart(Request $request){

       $cartIds = auth()->user()->cart->pluck('product_id');


         if(!in_array($request->id, $cartIds->toArray())){
            $product = $this->productRepository->findById($request->id);

            $cart = new Cart();
            $cart->create([
                 'user_id' => auth()->user()->id,
                'product_id' => $product->id,

            ]);
            $cartCount = auth()->user()->cart->count();
               return response()->json(['success' => true, 'message' => 'Product was successfully Added','cartCount' => $cartCount + 1], 200);
         }else{
            return response()->json(['success' => false, 'message' => 'Product Already In Cart' ], 404);

         }


    }

    public function delete($id) {
        $cart = Cart::where('product_id', $id)->first();
        $cart->delete();
        return redirect()->route('cart');
    }
}
