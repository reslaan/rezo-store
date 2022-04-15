<?php

namespace App\Http\Controllers\Admin;

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

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {

        $brands = Brand::orderBy('id', 'DESC')->get();

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
        return view('admin.brands.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(BrandRequest $request)
    {
        $is_active = 0;
        if ($request->has('is_active')) {
            $is_active = 1;
        }


        $brand = new Brand();
        $brand->name = $request->name;
        $brand->is_active = $is_active;
        if ($request->hasFile('photo')) {
            // uploadImage store file in local storage and return file hash name
            $fileName = uploadImage($request->photo, 'brands');
            $brand->photo = $fileName;
        }
        $brand->save();

        Session::flash('success',__('alerts.brand_created'));
        return redirect()->back();
    }



    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        if (!$brand)
            return redirect(route('admin.brands'))->with([
                'error' => __('alerts.not_exist'),
            ]);

        return view('admin.brands.edit')->with([
            'brand' => $brand,
        ]);


    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(BrandRequest $request, $id)
    {


        $brand = Brand::find($id);

        if (!$brand)
            return redirect(route('admin.brands'))->with([
                'error' =>  __('alerts.not_exist'),
            ]);

        $is_active = 0;
        if ($request->has('is_active')) {
            $is_active = 1;
        }

        $brand->name = $request->name;
        $brand->is_active = $is_active;
        if ($request->hasFile('photo')) {
            // uploadImage store file in local storage and return file hash name
            $fileName = uploadImage($request->photo, 'brands');
            $brand->photo = $fileName;
        }

        $brand->save();

        Session::flash('success',  __('alerts.edit_success'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand)
            return redirect()->back()->with([
                'success' =>  __('alerts.not_exist'),
            ]);

        // delete image from local storage
        deleteImage($brand->photo, 'brands');

        // delete translations before delete brand
        $brand->translations()->delete();
        $brand->delete();


        return redirect()->back()->with([
            'success' =>  __('alerts.deleted'),
        ]);
    }
}
