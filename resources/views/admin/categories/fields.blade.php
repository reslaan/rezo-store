<div class="form-body">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="name"> {{__('forms.name')}} </label>
                <input type="text" id="name" class="form-control"
                       placeholder="{{__('forms.name')}}"
                       name="name" value="{{$category->name ?? old('name')}}">
                @error("name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="parentId"> {{__('forms.main-category')}} </label>
                <select class="form-select" name="parent_id" id="parentId"
                        aria-label="Default select example">
                    <option value="0"
                            selected>{{__('forms.select-parent')}}</option>
                    @if($categories &&  $categories -> count() > 0)
                        @foreach($categories as $category_item)
                            <option value="{{$category_item->id}}" {{ isset($category) ? ($category_item->id == $category->parent_id ? 'selected' : '') : ''}}>{{$category_item->name}}</option>
                        @endforeach
                    @endif
                </select>
                @error("parent_id")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>


        <div class="col-md-6 ">
            <div class="form-group">
                <label for="slug"> {{__('forms.slug')}} </label>
                <input type="text" id="slug" class="form-control"
                       placeholder="{{__('slug')}}"
                       value="{{$category->slug ?? old('slug')}}" name="slug">
                @error("slug")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group">
                <label for="image" class="form-label"> {{__('forms.photo')}} </label>
                <input type="file" id="image" class="form-control"
                       placeholder=""
                        name="image">
                @error("image")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>
        @isset($category->image)
        <div class="col-md-6">
            <figure class="mt-2" style="width: 120px; height: auto;">
                <img src="{{ $category->photoPath() }}" id="categoryImage" class="img-fluid" alt="img">
            </figure>
        </div>
        @endisset

        <div class="col-md-6">

            <div class="toggle-flip form-group mt-1">
                <div>
                    {{__('forms.state')}}
                </div>
                <span class="badge">
                      <label for="isActive" class="form-check-label ">
                          <input class="form-check-input" type="checkbox" id="isActive" value="1"
                           name="is_active"  {{ isset($category) ? ($category->is_active == 1 ? 'checked' : '') : ' '}}>
                          <span
                              class="flip-indecator mt-2"
                              data-toggle-on="{{__('forms.active')}}"
                              data-toggle-off={{__('forms.inactive')}}></span>
                      </label>
                </span>

                @error("is_active")
                <span class="text-danger">{{$message}} </span>
                @enderror

            </div>


        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="featured" name="featured" {{  isset($category) ? ($category->featured == 1 ? 'checked' : "") : ''}}/>Featured Category
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="menu" name="menu" {{  isset($category) ? ($category->menu == 1 ? 'checked' : "") : ''}}/>Show in Menu
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>
