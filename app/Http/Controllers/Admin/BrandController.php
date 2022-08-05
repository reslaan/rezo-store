<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BrandContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use App\Models\BrandTranslation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BrandController extends BaseController
{
    protected $brandRepository;

    public function __construct(BrandContract $brandRepository){

        $this->brandRepository = $brandRepository;
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {

      $brands = $this->brandRepository->listBrands();

      $this->setPageTitle('Brands','list all brands');
        return view('admin.brands.index')->with([
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $this->setPageTitle(__('forms.new-brand'),'');
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(BrandRequest $request)
    {

        $params = $request->except('_token');
        $brand = $this->brandRepository->createBrand($params);

        if (!$params)
            return $this->responseRedirectBack(__('alert.try_later'),'error');
        return $this->responseRedirect('admin.brands.index','brand created successfully', 'success');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     */
    public function edit(Brand $brand)
    {


        $this->setPageTitle(__('forms.edit-brand'),'');
        return view('admin.brands.edit',compact('brand'));


    }

    /**
     * Update the specified resource in storage.
     * @param BrandRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BrandRequest $request)
    {


        $params = $request->except('_token');
        $brand = $this->brandRepository->updateBrand($params);
        if (!$brand){
            return $this->responseRedirectBack(__('alert.try_later','error'));
        }
        return $this->responseRedirectBack('brand updated','success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     *
     */
    public function destroy(Brand $brand)
    {
          $this->brandRepository->deleteBrand($brand);

          if (!$brand)
              return $this->responseRedirectBack(__('alert.try_later'),'error');
          return $this->responseRedirect('admin.brands.index',__('alerts.deleted'),'success');

     }
}
