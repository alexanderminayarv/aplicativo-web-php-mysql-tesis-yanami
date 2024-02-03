document.addEventListener('DOMContentLoaded', function () {
  cargarClientes();
  cargarServicios();
  cargarBancos();
});

function cargarClientes() {
  $.ajax({
    type: 'POST',
    url: base_url + '/ventas/cargarCombos/',
    data: { action: 'get-clients' },
    dataType: 'JSON',
    success: function (response) {
      var options = '<option value="0">Seleccione</option>';
      $.each(response, function (index, value) {
        options += '<option value="' + value.ID + '">' + value.Cliente + '</option>';
      });
      $('#cliente').html(options);
    },
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.log(jqXHR);
  });
}

function cargarServicios() {
  $.ajax({
    type: 'POST',
    url: base_url + '/ventas/cargarCombos/',
    data: { action: 'get-services' },
    dataType: 'JSON',
    success: function (response) {
      var options = '<option value="0">Seleccione</option>';
      $.each(response, function (index, value) {
        options += '<option value="' + value.ID + '">' + value.Nombre + '</option>';
      });
      $('#servicio').html(options);
    },
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.log(jqXHR);
  });
}


function cargarBancos() {
  $.ajax({
    type: 'POST',
    url: base_url + '/ventas/cargarCombos/',
    data: { action: 'get-banks' },
    dataType: 'JSON',
    success: function (response) {
      var options = '<option value="0">Seleccione</option>';
      $.each(response, function (index, value) {
        options += '<option value="' + value.ID + '">' + value.Nombre + '</option>';
      });
      $('#banco').html(options);
    },
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.log(jqXHR);
  });
}