<div class="row option-row">
    <div class="col-md-5">
        <label for="attributes" class="form-label required">{{__('forms.option')}} </label>
        <div class="form-group w-100">
            <input type="text" id="option[]" min="0" class="form-control option "
                   placeholder="{{__('forms.option')}}"
                   value="{{old('option')}}" name="attribute_options[][][name]">

            <span class="text-danger"> </span>

        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label for="" > {{__('forms.price')}} </label>
            <input type="text"  min="0" class="form-control price"
                   placeholder="{{__('forms.price')}}"
                    name="attribute_options[][][price]">
            <span class="text-danger"> </span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for=""></label>
            <button type="button" id="removeOption"  class="remove-option btn btn-outline-danger form-control mt-2 d-flex border-dashed">
                <i class="fa fa-trash m-auto"></i>
            </button>
        </div>
    </div>
</div>

