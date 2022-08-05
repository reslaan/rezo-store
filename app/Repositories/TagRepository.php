<?php


namespace App\Repositories;


use App\Contracts\BaseContract;
use App\Contracts\TagContract;
use App\Models\Tag;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TagRepository extends BaseRepository implements TagContract
{
    protected $model;

    public function __construct(Tag $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listTags(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findTagById(int $id)
    {
        try {

            return $this->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createTag(array $params)
    {
        try {
            $data = collect($params);
            $is_active = $data->has('is_active') ? 1 : 0;
            $merge =  $data->merge(compact('is_active'));


            $tag = new Tag($merge->all());
            // save translation name
            $tag->name = $data['name'];
            $tag->save();



            return $tag;

        } catch (QueryException $e) {
            return redirect()->back()->with([
                'error' => __('alerts.try_later')
            ]);

        }
    }

    public function updateTag(array $params)
    {
        $tag = $this->findTagById($params['id']);

        $data = collect($params);

        $is_active = $data->has('is_active') ? 1 : 0;
        $merge =  $data->merge(compact( 'is_active'));
        $tag->update($merge->all());
        // save translation name
        $tag->name = $data['name'];
        $tag->save();
        return $tag;
    }



    public function deleteTag($tag){

        $tag->translations()->delete();
        $tag->delete();

        return $tag;
    }
}
