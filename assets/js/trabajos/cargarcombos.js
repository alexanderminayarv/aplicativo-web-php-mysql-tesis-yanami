document.addEventListener('DOMContentLoaded', function() {
  cargarEscuelas(); 
  cargarUniversidades();
  cargarSituacionesAcademicas();
  cargarClientes();
});

function cargarEscuelas(){
  $.ajax({
      type: 'POST',
      url: base_url + '/trabajos/cargarCombos/',
      data: {action:'get-schools'},
      dataType: 'JSON',
      success: function(response){
          var options = '<option value="0">Seleccione</option>';
        $.each(response, function(index, value){
          options += '<option value="'+value.ID+'">'+value.Nombre+'</option>';
        }); 
        $('#escuela').html(options); 
      },
    }).fail(function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR);
    });
}

function cargarUniversidades(){
  $.ajax({
      type: 'POST',
      url: base_url + '/trabajos/cargarCombos/',
      data: {action:'get-universities'},
      dataType: 'JSON',
      success: function(response){
          var options = '<option value="0">Seleccione</option>';
        $.each(response, function(index, value){
          options += '<option value="'+value.ID+'">'+value.Nombre+'</option>';
        }); 
        $('#universidad').html(options); 
      },
    }).fail(function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR);
    });
}

function cargarSituacionesAcademicas(){
  $.ajax({
      type: 'POST',
      url: base_url + '/trabajos/cargarCombos/',
      data: {action:'get-academic-situations'},
      dataType: 'JSON',
      success: function(response){
          var options = '<option value="0">Seleccione</option>';
        $.each(response, function(index, value){
          options += '<option value="'+value.ID+'">'+value.Nombre+'</option>';
        }); 
        $('#situacion_academica').html(options); 
      },
    }).fail(function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR);
    });
}

function cargarClientes(){
  $.ajax({
      type: 'POST',
      url: base_url + '/trabajos/cargarCombos/',
      data: {action:'get-clients'},
      dataType: 'JSON',
      success: function(response){
          var options = '<option value="0">Seleccione</option>';
        $.each(response, function(index, value){
          options += '<option value="'+value.ID+'">'+value.N_Cliente+'</option>';
        }); 
        $('#cliente').html(options); 
      },
    }).fail(function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR);
    });
}