@if(Session::has('success'))

{{--    <div class="row mr-2 ml-2">--}}
{{--            <button type="text" class="btn message btn-lg btn-block text-light btn-outline-success mb-2"--}}
{{--                    id="type-error"  >{{Session::get('success')}}--}}
{{--            </button>--}}
{{--    </div>  --}}

    <h4 id="alertTitle" data-alert-title="success: "></h4>
    <p id="alertType" data-alert-type="success"></p>
    <p id="alertMessage" class="text-light" data-alert-message="{{Session::get('success')}}"></p>

@endif
@section('script')
    <script>
        let message = $('#alertMessage').data('alert-message');
        let title = $('#alertTitle').data('alert-title');
        let type = $('#alertType').data('alert-type');
        $('document').ready(function(){
            if (message){
                $.notify(`<p class="text-light mb-0 "> ${message} <i class="fa fa-check ms-2"></i></p>`,{
                    type: type === 'error' ? 'warning': type,
                });
                // $.notify({
                //     title: title,
                //     message: message,
                //     icon: 'fa fa-check'
                // },{
                //     // type: success, warning, info
                //     type: "info",
                // });
            }

        });
    </script>
@endsection
