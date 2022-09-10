<?php


namespace App\Repositories;


use App\Contracts\BaseContract;
use App\Contracts\BrandContract;
use App\Models\Brand;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BrandRepository extends BaseRepository implements BrandContract
{
    protected $model;

    public function __construct(Brand $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findBrandById(int $id)
    {
        try {

            return $this->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createBrand(array $params)
    {
        try {
            $data = collect($params);
              $photo = null;
            if ($data->has('photo')) {
                $photo = uploadImage($data['photo'], 'brands');
            }
            $is_active = $data->has('is_active') ? 1 : 0;
            $merge =  $data->merge(compact('photo','is_active'));


            $brand = new Brand($merge->all());
            // save translation name
            $brand->name = $data['name'];
            $brand->save();



            return $brand;

        } catch (QueryException $e) {
            return redirect()->back()->with([
                'error' => __('alerts.try_later')
            ]);

        }
    }

    public function updateBrand(array $params)
    {
        $brand = $this->findBrandById($params['id']);

        $data = collect($params);

        $photo = null;
        if ($data->has('photo')) {
            if ($brand->photo != null) {
                deleteImage($brand->photo, 'brands');
            }
            $photo = uploadImage($data['photo'], 'brands');
        }else{
            $photo = $brand->photo;
        }


        $is_active = $data->has('is_active') ? 1 : 0;
        $merge =  $data->merge(compact( 'photo','is_active'));
        $brand->update($merge->all());
        // save translation name
        $brand->name = $data['name'];
        $brand->save();
        return $brand;
    }



    public function deleteBrand($brand){


        if ($brand->photo != null)
            deleteImage($brand->photo,'brands');
        $brand->translations()->delete();
        $brand->delete();

        return $brand;
    }
}
