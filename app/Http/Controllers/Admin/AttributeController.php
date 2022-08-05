<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttributeController extends BaseController
{
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository){
        $this->attributeRepository = $attributeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $attributes = $this->attributeRepository->listAttributes();
        $this->setPageTitle('Attributes',null);
        return view('admin.attributes.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $this->setPageTitle(__('forms.new-attribute'), 'Create Attribute');
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AttributeRequest $request)
    {
        $params = $request->except('_token');
       $attribute = $this->attributeRepository->createAttribute($params);
       if (!$attribute){
           return $this->responseRedirectBack('error when add new attribute','error');
       }
       return $this->responseRedirect('admin.attributes.index','Attribute added successfully','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return Response
     */
    public function edit(Attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     *
     */
    public function update(AttributeRequest $request)
    {
        $params = $request->except('_token');
        $attribute = $this->attributeRepository->updateAttribute($params);
        if (!$attribute){
            return $this->responseRedirectBack('error when update  attribute','error');
        }
        return $this->responseRedirect('admin.attributes.index','Attribute updated successfully','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     *
     */
    public function destroy(Attribute $attribute)
    {
        $this->attributeRepository->deleteAttribute($attribute);
        if (!$attribute) {
            return $this->responseRedirectBack(__('alerts.try_later'), 'error');
        }
        return $this->responseRedirect('admin.attributes.index',__('alerts.deleted'), 'success');

    }
}
