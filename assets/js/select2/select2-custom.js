$(function () {
    "use strict";

    $('.form-select').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: true,
        dropdownParent: $('#agregarTrabajo .modal-body')
    });

    $('.form-select2').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: true,
        dropdownParent: $('#editarTrabajo .modal-body')
    });

    $('.form-select3').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: true,
        dropdownParent: $('#agregarVenta .modal-body')
    });

    $('.form-select4').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: true,
        dropdownParent: $('#editarVenta .modal-body')
    });

});	 