<form id="optionForm">
    @csrf
    <div class="modal fade" id="extraFields" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('forms.options')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @foreach($product->attributes as $attribute)
                        <div class="container bg-light border border-light-50 py-2 rounded mb-2 attribute">
                            <div class="row">
                                <div class="col-10">
                                    <label for="attributes" class="form-label"> {{__('forms.attribute')}} </label>
                                    <div class="form-group w-100">
                                        <select class="form-select w-100 single-select" id="attributes"
                                                onchange="attributeValue()"
                                                name="attribute_options[{{$attribute->id}}]">
                                            @foreach($attributes as $item)
                                                <option class="attr-key"
                                                        value="{{$item->id}}"
                                                    {{$attribute->id == $item->id ? 'selected' : ''}} >{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("attribute")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <button type="button"
                                                class="remove-attribute btn btn-danger form-control mt-2 d-flex ">
                                            <i class="fa fa-trash m-auto"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @foreach($product->options as $option)
                                @if($option->attribute->id == $attribute->id )
                                    <div class="row option-row">
                                        <input type='hidden' id="optionId" class="option-id"
                                               name="attribute_options[{{$attribute->id}}][][id]"
                                               value="{{$option->id}}">

                                        <div class=" col-5">
                                            <label for="attributes"
                                                   class="form-label required"> {{__('forms.option')}} </label>
                                            <div class="form-group w-100">
                                                <input type="text" id="options" min="0" class="form-control option"
                                                       placeholder="{{$option->name ??__('option')}}"
                                                       value="{{ $option->name ?? old('option')}}"
                                                       name="attribute_options[{{$attribute->id}}][][name]">

                                                <span class="text-danger"> </span>

                                            </div>
                                        </div>


                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="option_prices"> {{__('forms.price')}} </label>
                                                <input type="text" min="0" class="form-control price"
                                                       placeholder="{{$option->price ??__('price')}}"
                                                       value="{{$option->price ?? 00}}"
                                                       name="attribute_options[{{$attribute->id}}][][price]">

                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class=" col-2">
                                            <div class="form-group">
                                                <label for=""></label>
                                                <button type="button" id="removeOption"
                                                        class="remove-option btn btn-outline-danger form-control mt-2 d-flex border-dashed">
                                                    <i class="fa fa-trash m-auto"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="row justify-content-center my-2">
                                <button type="button" id="addOption"
                                        class="btn btn-outline-primary border-dashed col-md-3 add-option"><i
                                        class="fal fa-plus"></i> Add New Option
                                </button>
                            </div>
                        </div>
                    @endforeach

                    <div class="container my-3 px-0">
                        <button type="button"
                                class="btn btn-block btn-outline-dark border-dashed fw-bold add-attribute"><i
                                class="fal fa-plus"></i> Add New Attribute
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
@section('option-script')
    <script>
        // append attribute key to attribute_option array
        function attributeValue() {
            let optionRow = $('.option-row')
            let index = 0;
            optionRow.each(function () {
                let select = $(this).parents('.attribute').find('select')
                let optionId = $(this).children('.option-id')
                let option = $(this).find('.option')
                let price = $(this).find('.price')


                optionId.attr('name', 'attribute_options[' + select.val() + '][' + index + '][id]')
                option.attr('name', 'attribute_options[' + select.val() + '][' + index + '][name]')
                price.attr('name', 'attribute_options[' + select.val() + '][' + index + '][price]')

                // add class to display errors
                option.siblings('.text-danger').addClass('attribute_options-' + select.val() + '-' + index + '-name');
                price.siblings('.text-danger').addClass('attribute_options-' + select.val() + '-' + index + '-price');

                // console.log(index + ': ' + 'id : ' + optionId.val() + ' , name : ' + option.val() + ' , price : ' + price.val())
                index++;
            })

            tail.select('.single-select', {
                width: '100%',
                animate: true,
                deselect: true,

            })
        }

        $(document).ready(function () {
            if (localStorage.getItem("Status")) {
                $.notify(`<p class="text-light mb-0 text-center fs-5">تم الحفظ بنجاح  <i class="fa fa-xing ms-2"></i></p>`, {
                    type: 'success',
                    z_index: 2000,
                });
                localStorage.clear();
            }

            let maxFields = 2;
            let optionCount = 1;
            let attrCount = 1


            // append attribute key to attribute_option array
            attributeValue();

            //  add new option
            $(document).on('click', '.add-option', function () {

                let parent = $(this).parent();
                optionCount = parent.siblings('.option-row').length
                if (optionCount < maxFields) {
                    let newOption = '';
                    newOption += `@include('admin.products.includes.option-fields')`;
                    parent.before(newOption)

                    // append attribute key to attribute_option array
                    attributeValue();

                    if (optionCount > 0) {
                        let removeBtn = $(this).parents('.attribute').find('.remove-option')
                        removeBtn.removeClass('d-none')
                    }
                } else {
                    $.notify(`<p class="text-light mb-0 text-center fs-5">تجاوزت الحد المسموح <i class="fa fa-xing ms-2"></i></p>`, {
                        type: 'danger',
                        z_index: 2000,
                    });

                }

            })

            //  remove an option field
            $(document).on('click', '.remove-option', function (e) {
                e.preventDefault();
                optionCount = $(this).parents('.attribute').children('.option-row').length - 1
                let parent = $(this).parents('.option-row')
                let removeBtn = $(this).parents('.attribute').children('.option-row').find('.remove-option')
                $(parent).remove();
                console.log(optionCount)
                console.log(removeBtn)
                optionCount === 1 ? removeBtn.addClass('d-none') : removeBtn.removeClass('d-none')


            });

            //add New Attribute
            $('.add-attribute').on('click', function () {
                attrCount = $(this).parent().siblings('.attribute').length
                if (attrCount < maxFields) {
                    let newOption = '';
                    newOption += `@include('admin.products.includes.attribute-fields')`;
                    let parent = $(this).parent();
                    parent.before(newOption)
                    // append attribute key to option
                    attributeValue();
                    if (attrCount > 0) {
                        let removeBtn = $('.remove-attribute')
                        removeBtn.removeClass('d-none')
                    }
                } else {
                    $.notify(`<p class="text-light mb-0 text-center fs-5">تجاوزت الحد المسموح <i class="fa fa-xing ms-2"></i></p>`, {
                        type: 'danger',
                        z_index: 2000,
                    });
                }
            })

            //  remove attribute
            $(document).on('click', '.remove-attribute', function (e) {
                attrCount = $(this).parents('.modal-body').children('.attribute').length - 1
                console.log(attrCount)
                e.preventDefault();
                let parent = $(this).parents('.attribute')
                $(parent).remove()
                // let removeBtn = $('.remove-attribute')
                // attrCount === 1 ? removeBtn.addClass('d-none') : removeBtn.removeClass('d-none')
            });

            // submit option form
            $('#optionForm').on('submit', function (e) {

                e.preventDefault()
                $.ajax({
                    url: '{{route('admin.product.options',$product)}}',
                    method: 'post',
                    data: new FormData(this),
                    processData: false,
                    // dataType:'json',
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN':
                            "{{ csrf_token() }}",
                    },
                    beforeSend: function () {
                        $(document).find('span.text-danger').text('')
                    },
                    success: function (response) {

                        localStorage.setItem("Status", response.success)
                        location.reload();
                        console.log('success')

                    },
                    error: function (response) {
                        console.log('error')
                        // console.log(response.responseJSON.errors)
                        if (response.responseJSON.errors) {
                            $.each(response.responseJSON.errors, function (prefix, val) {

                                console.log(prefix)
                                console.log(val[0])
                                prefix = prefix.replaceAll('.', '-');
                                $('.' + prefix).text(val[0])

                            })
                        }

                    }

                })
            })
        })
    </script>
@endsection
