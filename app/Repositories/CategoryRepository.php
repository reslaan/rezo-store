<?php


namespace App\Repositories;


use App\Contracts\BaseContract;
use App\Contracts\CategoryContract;
use App\Models\Category;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    protected $model;

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findCategoryById(int $id)
    {
        try {

            return $this->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createCategory(array $params)
    {
        try {
            $data = collect($params);
              $image = null;
            if ($data->has('image')) {
                $image = uploadImage($data['image'], 'categories');
            }
            $is_active = $data->has('is_active') ? 1 : 0;
            $featured = $data->has('featured') ? 1 : 0;
            $menu = $data->has('menu') ? 1 : 0;
            $merge =  $data->merge(compact('menu', 'image', 'featured','is_active'));


            $category = new Category($merge->all());
            // save translation name
           $category->name = $data['name'];
            $category->save();



            return $category;

        } catch (QueryException $e) {
            return redirect()->back()->with([
                'error' => __('alerts.try_later')
            ]);

        }
    }

    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $data = collect($params);

        $image = null;
        if ($data->has('image')) {
            if ($category->image != null) {
                deleteImage($category->image, 'categories');
            }
            $image = uploadImage($data['image'], 'categories');
        }else{
            $image = $category->image;
        }


        $is_active = $data->has('is_active') ? 1 : 0;
        $featured = $data->has('featured') ? 1 : 0;
        $menu = $data->has('menu') ? 1 : 0;
        $merge =  $data->merge(compact('menu', 'image','featured','is_active'));

        $category->update($merge->all());
        // save translation name
        $category->name = $data['name'];
        $category->save();
        return $category;
    }



    public function deleteCategory($category){


        if ($category->image != null)
            deleteImage($category->image,'categories');
        $category->translations()->delete();
        $category->delete();

        return $category;
    }

    public function findBySlug($slug)
    {
        return Category::with('products')
            ->where('slug',$slug)
            ->where('menu',1)
            ->first();
    }
}
