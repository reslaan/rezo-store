<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductOptionsRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Media;
use App\Models\Option;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends BaseController
{
    protected $productRepository;

    public function __construct(ProductContract $productRepository){
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * //     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle(__('forms.products'),'');
       // $categories = Category::select('id')->get();
        return view('admin.products.index')->with([
            'products' => $products,
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
     * @param \Illuminate\Http\Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(ProductRequest $request)
    {

        $params = $request->except('_token');

        $product = $this->productRepository->create($params);

        if (!$product)
            return $this->responseRedirectBack(__('alerts.try_later'),'error');

        Session::flash('success', __('alerts.product_created'));
        return redirect(route('admin.products.edit', $product));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\product $product
     * @return Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\product $product
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, product $product)
    {

        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params,$product);

        if (!$product)
            return $this->responseRedirectBack(__('alerts.try_later'),'error');
        return $this->responseRedirectBack(__('alerts.product_updated'),'success');

    }


    public function saveImages(Request $request)
    {
        $id = $request->header('id');
        $product = Product::find($id);

        $imagesCount = $product->images->count();
        if ($imagesCount < 5) {
            $file = $request->file('dzProductImages');
            $size = File::size($file);
            if ($file)
                $fileName = uploadImage($file, 'products');

            Media::create([
                'model_id' => $id,
                'model_type' => 'App\Models\Product',
                'file_name' => $fileName,
                'size' => $size,
            ]);


            return response()->json([
                'name' => $fileName,
            ]);
        } else {
            return response()->json([
                'failed' => __('alerts.limit_5'),
            ]);
        }

    }



    public function showImages(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $images = $product->images;
        $file_list = [];
        foreach ($images as $image) {
            // $path = asset('storage/images/products/'.$image->file_name);
            $path = $image->path('products');
            $size = $image->size;

            $file_list[] = ['name' => $image->file_name, 'size' => $size, 'path' => $path];
        }
        return $file_list;

    }


    public function deleteImage(Request $request)
    {

        $product = Product::find($request->id);
        $file_name = $request->name;
        $image = Media::where('file_name', $file_name)->first();
        $image->delete();
        deleteImage($file_name, 'products');
        $imagesCount = $product->images->count();
        return response()->json([
            'imagesCount' => $imagesCount,
            'message' => __('alerts.deleted'),
            'type' => 'success', // notify classes
        ]);
    }
    public function saveProductOptions(ProductOptionsRequest $request, Product $product)
    {

        $attributes = $request->attribute_options;
//print_r($attributes);

        if (isset($product->attributes)) {
            foreach ($product->attributes as $attribute) {
                // check if attribute id not in array
                if (!isset($attributes[$attribute->id])) {
                    $product->attributes()->detach($attribute);
                }
            }
        }
        // delete option that not come with the form
        if (isset($product->options)){
            foreach ($product->options as $option) {
                $state = false;
                if (isset($attributes)){
                    foreach ($attributes as $key => $attribute) {
                        if ($key != 0 ){
                            if (is_array($attribute)){
                                foreach ($attribute as $key => $items) {
                                    if (isset($items['id']) && $option->id == $items['id']){
                                        $state = true;
                                    }

                                }
                            }

                        }

                    }
                }

                if (!$state) {
                    $option->translations()->delete();
                    $option->delete();


                }
            }

        }

        // add new attribute, new option and update existing option
        if (isset($attributes)){
            foreach ($attributes as $key => $attribute) {

                if ($key != 0){
                    // add new attribute
                    $is_attribute = $product->attributes()->where('attribute_id', $key)->first();
                    if (!$is_attribute) {
                        $product->attributes()->attach($key);
                    }
                    if (is_array($attribute)){
                        foreach ($attribute as $items) {
                            // update existing option
                            if (isset($items['id'])) {

                                $option = $product->options()->where('id', $items['id'])->first();
                                if ($option){
                                    $option->name = $items['name'];
                                    $option->price = $items['price'];
                                    $option->attribute_id = $key;
                                    $option->save();
                                }

                            } else {
                                // add new option
                                if (isset($items['name'])) {
                                    $option = new Option();
                                    $option->name = $items['name'];
                                    $option->product_id = $product->id;
                                    $option->attribute_id = $key;
                                    $option->price = $items['price'];
                                    $option->save();
                                }


                            }

                        }
                    }

                }



            }
        }


        return \response()->json([
            'success' => $product->options
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(product $product)
    {


        $this->productRepository->delete($product);
        if (!$product) {
            return $this->responseRedirectBack(__('alerts.try_later'), 'error');
        }
        return $this->responseRedirect('admin.products.index',__('alerts.deleted'), 'success');
    }
}
