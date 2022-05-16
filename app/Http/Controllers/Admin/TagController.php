<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * //     * @return Application|Factory|Response|View
     */
    public function index()
    {

        $tags = Tag::orderBy('id', 'DESC')->get();
        return view('admin.tags.index')->with([
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.tags.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return RedirectResponse
     */
    public function store(TagRequest $request)
    {
        try {
            $is_active = 0;
            if ($request->has('is_active')) {
                $is_active = 1;
            }
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->slug = $request->slug;
            $tag->is_active = $is_active;
            $tag->save();
            Session::flash('success',  __('alerts.tag_created'));
            return redirect()->route('admin.tags.index');
        } catch (\Exception $ex) {
            return redirect()->back()->with([
                'error' => __('alerts.not_exist')
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     *
     */
    public function edit(Tag $tag)
    {


        return view('admin.tags.edit')->with([
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function update(TagRequest $request, Tag $tag)
    {

        try {
            $is_active = 0;
            if ($request->has('is_active')) {
                $is_active = 1;
            }

            $tag->name = $request->name;
            $tag->slug = $request->slug;
            $tag->is_active = $is_active;
            $tag->save();
            Session::flash('success', __('alerts.edit_success'));
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with([
                'error' => __('alerts.not_exist')
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function destroy(Tag $tag)
    {

        try {
            $tag->translations()->delete();
            $tag->delete();
            Session::flash('success', __('alerts.deleted'));
            return redirect()->route('admin.tags.index');
        } catch (\Exception $ex) {
            return redirect()->back()->with([
                'error' => __('alerts.not_exist')
            ]);
        }

    }
}
