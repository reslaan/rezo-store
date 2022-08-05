<?php
namespace App\Contracts;



use Illuminate\Http\Request;

interface TagContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listTags(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findTagById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createTag(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTag(array $params );

    /**
     * @param $category
     * @return bool
     */
    public function deleteTag($category);
}
