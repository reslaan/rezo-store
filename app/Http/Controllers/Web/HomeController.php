<?php

namespace App\Http\Controllers\Web;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    /**
     * Create a new controller instance.
     *
     * @param ProductContract $productRepository
     * @param CategoryContract $categoryRepository
     */
    public function __construct(ProductContract $productRepository , CategoryContract $categoryRepository)
    {

        $this->middleware('guest');
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
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

    public function product($slug){
        $product = $this->productRepository->findBySlug($slug);
       // $product = Product::where('slug',$slug)->first();


        return view('web.product-details')->with([
            'product' => $product
        ]);
    }

    public function category($slug){
        $category = $this->categoryRepository->findBySlug($slug);
        return view('web.category')->with([
            'category' => $category
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
