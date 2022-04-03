<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index($type)
    {

        $categories = Category::$type()->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('admin.categories.index')->with([
            'categories' => $categories,
            'type' => $type,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create($type)
    {
        $categories = Category::categories()->get();
        if ($type == 'subcategories') {
            return view('admin.categories.new')->with([
                'type' => $type,
                'categories' => $categories,
            ]);
        }
        return view('admin.categories.new')->with([
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     *
     */
    public function store(CategoryRequest $request, $type)
    {

        if ($type == 'subcategories') {
            $request->validate(
                [
                    'parent_id' => 'required|exists:categories,id'
                ], [
                'parent_id.required' => 'الرجاء اختيار القسم الرئيسي',
                'parent_id.exists' => 'القسم غير موجود',
            ]);
        }
        $is_active = 0;
        if ($request->has('is_active')) {
            $is_active = 1;
        }

//        $category = new Category();
//        $category->slug = $request->slug;
//        $category->is_active = $is_active;
//        if ($request->has('parent_id')){
//            $category->parent_id = $request->parent_id;
//        }

        $category = Category::create($request->except('_token'));
        // save translation
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'تم إضافة القسم بنجاح');
        return redirect()->back();
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
     *
     */
    public function edit($type, $id)
    {

        $category = Category::find($id);

        if (!$category)
            return redirect(route('admin.categories'))->with([
                'error' => 'هذا القسم غير موجود',
            ]);


        if ($type == 'subcategories') {
            $categories = Category::categories()->get();
            return view('admin.categories.edit')->with([
                'type' => $type,
                'category' => $category,
                'categories' => $categories,
            ]);
        } else {
            return view('admin.categories.edit')->with([
                'category' => $category,
                'type' => $type,
            ]);

        }

    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(CategoryRequest $request, $type, $id)
    {
        try {

            DB::beginTransaction();
            $category = Category::find($id);
            if (!$category)
                return redirect()->back()->with([
                    'error' => 'هذا القسم غير موجود'
                ]);
                $is_active = 0;
                if ($request->has('is_active')) {
                    $is_active = 1;
                }
                $category->update($request->all());

                $category->name = $request->name;
                $category->is_active = $is_active;
                $category->save();

                DB::commit();
                return redirect()->back()->with([
                    'success' => 'تم التعديل بنجاح',
                    'type' => $type,
                ]);


        } catch (\Exception $ex) {
            return redirect()->back()->with([
                'error' => 'العملية لم تتم يرجى المحاولة لاحقاً'
            ]);
            DB::rollback();
        }

    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($type, $id)
    {
        // remove all translate before remove category
        CategoryTranslation::where('category_id', $id)->delete();
        Category::destroy($id);


        return redirect()->back()->with([
            'success' => 'تم الحذف بنجاح',
            'type' => $type,
        ]);
    }
}
