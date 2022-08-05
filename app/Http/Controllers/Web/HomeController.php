<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = Category::select('id','image')->where('featured',1)->limit(3)->get();
        $products = Product::select('id','slug','price')->where('is_active',1)->get();

        return view('web.home')->with([
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function product(){
        $categories = Category::categories('id')->limit(3)->get();

        return view('web.product-details')->with([
            'categories' => $categories
        ]);
    }

    public function category(){
        $categories = Category::categories('id')->limit(3)->get();

        return view('web.category')->with([
            'categories' => $categories
        ]);
    }

    public function cart(){
        $categories = Category::categories('id')->limit(3)->get();

        return view('web.cart')->with([
            'categories' => $categories
        ]);
    }
    public function checkout(){
        $categories = Category::categories('id')->limit(3)->get();

        return view('web.checkout')->with([
            'categories' => $categories
        ]);
    }
}