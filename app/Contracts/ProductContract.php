<?php
namespace App\Contracts;



use App\Models\Product;
use Illuminate\Http\Request;

interface ProductContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id);

    public function findBySlug($slug);

    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params);

    /**
     * @param array $params
     * @param Product $product
     * @return mixed
     */
    public function updateProduct(array $params ,Product $product );

    /**
     * @param $category
     * @return bool
     */
    public function delete($category);


}
