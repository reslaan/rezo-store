<?php


namespace App\Repositories;


use App\Models\Tag;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Contracts\TagContract;
use App\Contracts\BaseContract;
use App\Contracts\OrderContract;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TagRepository extends BaseRepository implements OrderContract
{
    protected $model;

    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {

    }

}
