<div class="form-body">


    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label for="name" class="required"> {{__('forms.name')}} </label>
                <input type="text" id="name" class="form-control"
                       placeholder="{{$product->name ?? __('name')}}"
                       value="{{$product->name ?? old('name')}}" name="name">
                @error("name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>


        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label for="price" class="required"> {{__('forms.price')}} </label>
                <input type="text" id="price" min="0" class="form-control "
                       placeholder="{{$product->price ??__('price')}}"
                       value="{{$product->price ?? old('price')}}" name="price">
                @error("price")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label for="qty" class="required"> {{__('forms.qty')}} </label>
                <input type="text" id="qty" min="0" class="form-control "
                       placeholder="{{$product->qty ??__('quantity')}}"
                       value="{{$product->qty ?? old('qty')}}" name="qty">
                @error("qty")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label for="slug"> {{__('forms.slug')}} <small>(slug)</small> </label>
                <input type="text" id="slug" class="form-control"
                       placeholder="{{$product->slug ?? __('slug')}}"
                       value="{{$product->slug ?? old('slug')}}" name="slug">
                @error("slug")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label for="sku" class="required"> {{__('forms.sku')}} <small>(sku)</small> </label>
                <input type="text" id="sku" class="form-control"
                       placeholder="{{$product->sku ?? __('sku')}}"
                       value="{{$product->sku ?? old('sku')}}" name="sku">
                @error("sku")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>




        <div class="col-md-6 col-lg-4">
            <label for="categories" class="form-label required"> {{__('forms.category')}} </label>
            <div class="form-group">
                <select class="form-select w-100 multi-select" id="categories" name="categories[]" multiple>
                    @isset($categories)
                        @foreach($categories as $category )
                            <option
                                value="{{$category->id}}"@isset($product) @foreach($product->categories as $item) {{ $item->id == $category->id ? 'selected' : ''  }} @endforeach @endisset>{{$category->name}}</option>
                        @endforeach
                    @endisset
                </select>
                @error("categories")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <label for="tags" class="form-label "> {{__('forms.tags')}} </label>
            <div class="form-group">
                <select class="form-select w-100 multi-select" id="tags" name="tags[]" multiple>

                    @isset($tags)
                        @foreach($tags as $tag )
                            <option
                                value="{{$tag->id}}"@isset($product)  @foreach($product->tags as $item) {{ $item->id == $tag->id ? 'selected' : ''  }} @endforeach @endisset >{{$tag->name}}</option>
                        @endforeach
                    @endisset
                </select>
                @error("tags")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <label for="brand" class="form-label"> {{__('forms.brand')}} </label>
            <div class="form-group">
                <select class="form-select w-100 single-select " id="brand" name="brand">
                    @isset($brands)
                        @foreach($brands as $brand )
                            <option
                                value="{{$brand->id}}" {{isset($product->brand) && $product->brand_id == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
                        @endforeach
                    @endisset
                </select>
                @error("brand")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="shortDescription" class="required"> {{__('forms.short_description')}} </label>
                        <textarea type="text" id="shortDescription" class="form-control "
                                  placeholder="{{$product->short_description ??__('short description')}}"
                                  rows="1"
                                  name="short_description">{{$product->short_description ?? old('short_description')}}</textarea>
                        @error("short_description")
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>


        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label for="description" class="required"> {{__('forms.description')}} </label>
                <textarea type="text" id="description" class="form-control "
                          placeholder="{{$product->description ??__('description')}}"
                           name="description"
                          rows="1">{{$product->description ?? old('description')}}</textarea>
                @error("description")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex flex-row justify-content-around">
            <div class="toggle-flip form-group mt-1">
                <label for="isActive" class="form-check-label ">
                    {{__('forms.state')}}
                    <input type="checkbox" id="isActive" value="1"
                           name="is_active" {{$product->is_active ?? '' == 1 ? 'checked' : "" }}><span
                        class="flip-indecator mt-2" data-toggle-on="{{__('forms.active')}}"
                        data-toggle-off={{__('forms.inactive')}}></span>
                </label>
                @error("is_active")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
            <div id='preview'>
            </div>
            <div class="toggle-flip form-group mt-1">
                <label for="inStock" class="form-check-label ">
                    {{__('forms.in_stock')}}
                    <input type="checkbox" id="inStock" value="1"
                           name="in_stock" {{$product->in_stock ?? '' == 1 ? 'checked' : ""}}><span
                        class="flip-indecator mt-2" data-toggle-on="{{__('forms.yes')}}"
                        data-toggle-off={{__('forms.no')}}></span>
                </label>
                @error("is_active")
                <span class="text-danger">{{$message}} </span>
                @enderror
            </div>
        </div>
        <br>
        @if( Route::currentRouteName() == 'admin.products.edit')
            <div class="row mb-2">
                <div class="col">
                    <label for="photo" class="required"> {{__('forms.add_photos')}}  </label><small
                        class="text-muted"> ( {{__('alerts.limit_5')}} )</small>
                    <div class="dropzone position-relative" id="photos">
                        <div class="dz-message text-muted m-auto  position-absolute top-50 start-50 translate-middle"><i
                                class="fa fa-cloud-upload fa-4x"></i></div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

