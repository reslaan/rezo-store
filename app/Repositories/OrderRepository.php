<?php


namespace App\Repositories;



use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Contracts\TagContract;
use App\Contracts\BaseContract;
use App\Contracts\OrderContract;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderRepository extends BaseRepository implements OrderContract
{
    protected $model;

    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {

        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>  auth()->user()->id,
            'status'            =>  'pending',
            'total'             =>  $params['total_price'],
            'item_count'        =>  auth()->user()->carts->count(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'address'           =>  $params['address'],

        ]);

        if ($order) {

            $items = auth()->user()->carts;





            foreach ($items as $item)
            {

                $product = Product::where('id', $item->product_id)->first();



                $orderItem = new OrderItem();
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $item->quantity;
                $orderItem->price = $product->price;

               //$orderItem->save();
                $order->items()->save($orderItem);
            }
        }

        return $order;

    }

}
