<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Media;
use App\Models\Option;
use App\Models\product;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * //     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        $categories = Category::select('id')->get();
        return view('admin.products.index')->with([
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::select('id')->get();
        $brands = Brand::select('id')->get();
        $tags = Tag::select('id')->get();
        $attributes = Attribute::select('id')->get();
        return view('admin.products.new')->with([
            'attributes' => $attributes,
            'categories' => $categories,
            'brands' => $brands,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!$request->has('is_active')) {
            $request->merge(['is_active' => 0]);
        }
        if (!$request->has('in_stock')) {
            $request->merge(['in_stock' => 0]);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->slug = $request->slug;
        $product->sku = $request->sku;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->brand_id = $request->brand;
        $product->is_active = $request->is_active;
        $product->in_stock = $request->in_stock;


        $product->save();
        $product->categories()->attach( $request->categories);
        $product->tags()->attach( $request->tags);
        Session::flash('success', __('alerts.category_created'));
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return Application|Factory|Response|View
     */
    public function edit(product $product)
    {
        $attributes = Attribute::select('id')->get();;
        $options = Option::select('id')->get();
        $categories = Category::select('id')->get();
        $brands = Brand::select('id')->get();
        $tags = Tag::select('id')->get();
        return view('admin.products.edit')->with([
            'product' => $product,
            'attributes' => $attributes,
            'categories' => $categories,
            'brands' => $brands,
            'tags' => $tags,
            'options' => $options,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return Response
     */
    public function update(Request $request, product $product)
    {



        return redirect()->back();
    }


    public function saveImages(Request $request){
        $id = $request->header('id');
        $product = Product::find($id);

        $imagesCount = $product->images->count();
        if ($imagesCount < 5){
            $file = $request->file('dzProductImages');
            $size = File::size($file);
            if ($file)
                $fileName =  uploadImage($file,'products');

            Media::create([
                'model_id' => $id,
                'model_type' => 'App\Models\Product',
                'file_name' => $fileName,
                'size' => $size,
            ]);

            $imagesCount+=1;
            return response()->json([
                'name' => $fileName,
                'success' => '',
                'imagesCount' => $imagesCount  ,
            ]);
        }else{
            return response()->json([
                'failed' => 'الحد المسموح به 5 صور فقط',
                'imagesCount' => $imagesCount,
            ]);
        }

    }
    public function test(){
        $image = Media::find(284);
        $path = $image->path('products');
        $size = File::size($path);
        dd($size);
    }
    public function showImages(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        $images = $product->images;
        $file_list = [];
        foreach ($images as $image){
           // $path = asset('storage/images/products/'.$image->file_name);
            $path = $image->path('products');
          $size = $image->size;

            $file_list[] = ['name' => $image->file_name,'size' => $size, 'path' => $path];
        }
        return $file_list;

    }



    public function deleteImage(Request $request){

        $product = Product::find($request->id);
        $file_name = $request->name;
        $image = Media::where('file_name',$file_name)->first();
        $image->delete();
        deleteImage($file_name,'products');
        $imagesCount = $product->images->count();
        return response()->json([
            'imagesCount' =>  $imagesCount ,
            'message' =>  __('alerts.deleted'),
            'type' =>  'success', // notify classes
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return Response
     */
    public function destroy(product $product)
    {
        //
    }
}
