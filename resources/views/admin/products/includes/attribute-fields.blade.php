<div class="container bg-light border border-light-50 py-2 rounded mb-2 attribute" >
    <div class="row">
        <div class="col-md-10">
            <label for="attributes" class="form-label"> {{__('forms.attribute')}} </label>
            <div class="form-group w-100">
                <select class="form-select w-100 single-select" id="attributes" name="attribute_options[]" onchange="attributeValue()">
                    @foreach($attributes as $item)
                        <option class="attr-key"
                            value="{{$item->id}}"   @if($loop->first) selected @endif >{{$item->name}}</option>
                    @endforeach
                </select>
                @error("attribute")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for=""></label>
                <button type="button"  class="remove-attribute btn btn-danger form-control mt-2 d-flex ">
                    <i class="fa fa-trash m-auto"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row option-row">
        <div class="col-md-5">
            <label for="attributes" class="form-label required"> {{__('forms.option')}} </label>
            <div class="form-group w-100">
                <input type="text" id="option" min="0" class="form-control option "
                       placeholder="{{__('forms.option')}}"
                        name="attribute_options[][][name]">

                <span class="text-danger"></span>

            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="option_prices[]" > {{__('forms.price')}} </label>
                <input type="text"  min="0" class="form-control price"
                       placeholder="{{__('forms.price')}}"
                       value="" name="attribute_options[][][price]">

                <span class="text-danger"> </span>

            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for=""></label>
                <button type="button"  class="remove-option btn btn-outline-danger form-control mt-2 d-flex border-dashed d-none">
                    <i class="fa fa-trash m-auto"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-2">
        <button type="button" id="addOption" class="btn btn-outline-primary border-dashed col-md-3 add-option"><i class="fal fa-plus"></i> Add New Option </button>
    </div>
</div>
