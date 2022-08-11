<?php


namespace App\Repositories;


use App\Contracts\BaseContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Models\Category;
use App\Models\Product;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductContract
{
    protected $model;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findById(int $id)
    {
        try {

            return $this->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }


    public function findBySlug($slug)
    {
        return Product::where('slug', $slug)
            ->where('is_active', 1)
            ->first();
    }

    public function create(array $params)
    {
        try {
            $data = collect($params);

            $is_active = $data->has('is_active') ? 1 : 0;
            $in_stock = $data->has('in_stock') ? 1 : 0;
            $brand_id = $data->has('brand') ? $data['brand'] : '';
            $merge = $data->merge(compact('in_stock', 'brand_id', 'is_active'));


            $product = new Product($merge->all());
            // save translation
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->short_description = $data['short_description'];
            $product->save();

            $product->categories()->sync($data['categories']);
            if ($data->has('tags'))
                $product->tags()->sync($data['tags']);

            return $product;

        } catch (QueryException $e) {
            return redirect()->back()->with([
                'error' => __('alerts.try_later')
            ]);

        }
    }

    public function updateProduct(array $params, Product $product)
    {


        try {
            $data = collect($params);

            $is_active = $data->has('is_active') ? 1 : 0;
            $in_stock = $data->has('in_stock') ? 1 : 0;
            $brand_id = $data->has('brand') ? $data['brand'] : '';
            $merge = $data->merge(compact('in_stock', 'brand_id', 'is_active'));


            $product->update($merge->all());
            // save translation
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->short_description = $data['short_description'];
            $product->save();

            $product->categories()->sync($data['categories']);
            if ($data->has('tags'))
                $product->tags()->sync($data['tags']);

            return $product;

        } catch (QueryException $e) {
            return redirect()->back()->with([
                'error' => __('alerts.try_later')
            ]);
        }
    }


    public function delete($product)
    {

        $images = $product->images()->get();

        foreach ($images as $image) {
            deleteImage($image->file_name, 'products');
        }
        $product->images()->delete();
        $product->translations()->delete();
        $product->delete();

        return $product;
    }

}
