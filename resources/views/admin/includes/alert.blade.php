@if(Session::has('success'))
    <h4 id="alertTitle" data-alert-title="success: "></h4>
    <p id="alertType" data-alert-type="success"></p>
    <p id="alertMessage" class="text-light" data-alert-message="{{Session::get('success')}}"></p>
@endif
@if(Session::has('error'))
    <p id="alertType" data-alert-type="danger"></p>
    <h4 id="alertTitle" data-alert-title="error: "></h4>
    <p id="alertMessage" class="text-light" data-alert-message="{{Session::get('error')}}"></p>
@endif
@section('alert-script')
    <script>
        let message = $('#alertMessage').data('alert-message');
        let title = $('#alertTitle').data('alert-title');
        let type = $('#alertType').data('alert-type');
        $('document').ready(function(){
            if (message){
                $.notify(`<p class="text-light mb-0 text-center fs-5"> ${message} <i class="fa fa-check ms-2"></i></p>`,{
                    // type: primary, info , success, warning, danger, dark, light, secondary
                    type: type,
                });
            }
        });
    </script>
@endsection
