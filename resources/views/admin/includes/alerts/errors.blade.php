@if(Session::has('error'))
{{--    <div class="row mr-2 ml-2" >--}}
{{--            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"--}}
{{--                    id="type-error">{{Session::get('error')}}--}}
{{--            </button>--}}
{{--    </div>--}}
<p id="alertType" data-alert-type="error"></p>
    <h4 id="alertTitle" data-alert-title="error: "></h4>
    <p id="alertMessage" class="text-light" data-alert-message="{{Session::get('error')}}"></p>
@endif
@section('script')
    <script>
        let type = $('#alertType').data('alert-type');
        let message = $('#alertMessage').data('alert-message');
        let title = $('#alertTitle').data('alert-title');
        $('document').ready(function(){
            if (message){
                $.notify(`<p class="text-light mb-0 "> ${message} <i class="fa fa-check ms-2"></i></p>`,{
                    type: type,
                });
            }

        });
    </script>
@endsection
