<?php


namespace App\Repositories;


use App\Contracts\AttributeContract;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;


class AttributeRepository extends BaseRepository implements AttributeContract
{
    protected $model;

    public function __construct(Attribute $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findAttributeById(int $id)
    {
        try {

            return $this->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createAttribute(array $params)
    {
        try {
            $data = collect($params);
            $attribute = new Attribute();
            // save translation name
            $attribute->name = $data['name'];
            $attribute->save();

            return $attribute;

        } catch (QueryException $e) {
            return redirect()->back()->with([
                'error' => __('alerts.try_later')
            ]);

        }
    }

    public function updateAttribute(array $params)
    {
        try {
            $attribute = $this->findAttributeById($params['id']);

            $data = collect($params);
            // save translation name
            $attribute->name = $data['name'];
            $attribute->save();
            return $attribute;

        } catch (QueryException $e) {
            return redirect()->back()->with([
                'error' => __('alerts.try_later')
            ]);

        }


    }


    public function deleteAttribute($attribute)
    {

        $attribute->translations()->delete();
        $attribute->delete();

        return $attribute;
    }
}
