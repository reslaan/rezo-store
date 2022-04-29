/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('bootstrap');
require('sweetalert');
window.$ = window.jQuery = require('jquery');

let deleteBtn = document.querySelector('#deleteBtn');


jQuery(document).ready(function ($) {


    let deleteForm = $('.deleteForm');
    let name = deleteForm.data('name');
    let title = deleteForm.data('title');
    let text = deleteForm.data('text');

    let deleteBtn = $('.deleteBtn');
    let ok = deleteBtn.data('ok');
    let cancel = deleteBtn.data('cancel');
    let cancelSuccess = deleteBtn.data('cancel-success');

    deleteBtn.click(function (e) {
        let id = $(this).attr('data-id');

        swal({
            title: title,
            text: text + " " + name + " !!",
            icon: "warning",
            buttons: [cancel, ok],
            className: "",
            dangerMode: true,
            //buttons: true,
            // confirmButtonClass: "btn btn-outline-info",


        })
            .then(willDelete => {
                if (willDelete) {
                    $(document).find('#deleteForm_' + id).submit();
                    // swal("Deleted!", "Your imaginary file has been deleted!", "success");
                } else {
                    swal({
                        text: cancelSuccess,
                        button:false,
                        timer:1800,
                        icon: 'error'
                    })
                }
            });
    })
    //
    // let form = document.querySelector('#form');
    // $('#showFields').click(function (){
    //     console.log('show ')
    //     form.innerHTML +=`@include('admin.products.extra-fields')`;
    // })

});

