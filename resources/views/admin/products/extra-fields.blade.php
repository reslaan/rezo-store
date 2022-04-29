<div class="form-body" id="options">
    <div class="row " id="">
        @isset($product->attributes)
            <div class="col-md-4 "><label for="attributes" class="form-label"> {{"الخاصية"}} </label>
                <div class="form-group w-100">
                    <select class="form-select w-100 single-select" id="attributes" name="attributes[]">
                        @foreach($attributes as $attribute)
                            <option
                                value="{{$attribute->id}}"{{$attribute->id == 'kko' ? 'selected' : ''}} >{{$attribute->name}}</option>
                        @endforeach
                    </select>
                    @error("slug")
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 "><label for="options" class="form-label"> {{"الخيار"}} </label>
                <div class="form-group w-100">
                    <select class="form-select w-100 single-select" id="" name="options[]">
                        @if($options &&  $options -> count() > 0)
                            @foreach($options as $option)
                                <option
                                    value="{{$option->id}}"{{$option->id == 'kko' ? 'selected' : ''}} >{{$option->name}}</option>
                            @endforeach
                        @endif
                    </select>

                    @error("slug")
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="option_prices[]" class="required"> {{__('admin/forms.price')}} </label>
                    <input type="text" id="price[]" min="0" class="form-control "
                           placeholder="{{$product->price ??__('price')}}"
                           value="{{$product->price ?? old('price')}}" name="option_prices[]">
                    @error("price")
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for=""></label>
                    <button type="button" id="add" class=" btn btn-outline-primary form-control mt-2 d-flex">
                        <i class="fa fa-plus m-auto"></i>
                    </button>
                </div>
            </div>
        @endisset
    </div>
</div>





