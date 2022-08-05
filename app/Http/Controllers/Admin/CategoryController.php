<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{

    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository){

        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @param $type
     */
    public function index()
    {


        $categories = $this->categoryRepository->listCategories();


        $this->setPageTitle(__('sidebar.categories'),'list all categories');

        return view('admin.categories.index')->with([
            'categories' => $categories,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

        $categories = $this->categoryRepository->listCategories('id', 'asc');

        $this->setPageTitle(__('forms.new-category'), 'Create Category');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {


        $params = $request->except('_token');

        $category = $this->categoryRepository->createCategory($params);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error');
        }
        return $this->responseRedirect('admin.categories.index', 'Category added successfully' ,'success');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     *
     */
    public function edit(Category $category)
    {
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'Edit Category : '.$category->name);
        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request)
    {
        $params = $request->except('_token');

        $category = $this->categoryRepository->updateCategory($params);

        if (!$category) {
            return $this->responseRedirectBack(__('alerts.try_later'), 'error');
        }
        return $this->responseRedirectBack(__('alerts.edit_success'), 'success');

    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // delete category and its translations
        $this->categoryRepository->deleteCategory($category);

        if (!$category) {
            return $this->responseRedirectBack(__('alerts.try_later'), 'error');
        }
        return $this->responseRedirect('admin.categories.index',__('alerts.deleted'), 'success');


    }
}
