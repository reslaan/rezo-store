<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\TagContract;
use App\Http\Controllers\BaseController;
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

class TagController extends BaseController
{
    protected $tagRepository;

    public function __construct(TagContract $tagRepository){
        $this->tagRepository = $tagRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * //     * @return Application|Factory|Response|View
     */
    public function index()
    {

        $tags = $this->tagRepository->listTags();
        $this->setPageTitle(__('sidebar.tags'),'');
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
        $this->setPageTitle(__('sidebar.add-tag'),'');
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return RedirectResponse
     */
    public function store(TagRequest $request)
    {
        $params = $request->except('_token');
        $tag = $this->tagRepository->createTag($params);
        if (!$tag)
            return $this->responseRedirectBack(__('alerts.try_later'),'error');
        return $this->responseRedirect('admin.tags.index',__('alerts.tag_created'),'success');



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

        $this->setPageTitle(__('forms.edit-tag'),'');
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
    public function update(TagRequest $request)
    {
        $params = $request->except('_token');
        $tag = $this->tagRepository->updateTag($params);

        if (!$tag)
            return $this->responseRedirectBack(__('alerts.try_later'),'error');
        return $this->responseRedirectBack(__('alerts.edit_success'),'success');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function destroy(Tag $tag)
    {

      $this->tagRepository->deleteTag($tag);

        if (!$tag)
            return $this->responseRedirectBack(__('alerts.try_later'),'error');
        return $this->responseRedirect('admin.tags.index',__('alerts.deleted'),'success');
    }
}
