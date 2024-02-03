function verDatos(id) {
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/trabajos/editar/";
    let strData = "id=" + id;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);
  
        if (objData.status) {

          document.querySelector("#titulo_t").value = objData.work.Titulo;

          var ID_Escuela2 = document.getElementById("escuela_t");
          LlenarCombo(ID_Escuela2,objData.school,objData.work.Escuela);

          var ID_Universidad2 = document.getElementById("universidad_t");
          LlenarCombo(ID_Universidad2,objData.university,objData.work.Universidad);

          var ID_SituacionAcademica2 = document.getElementById("situacion_academica_t");
          LlenarCombo(ID_SituacionAcademica2,objData.academicsituation,objData.work.Situacion_Academica);

          var ID_Cliente2 = document.getElementById("cliente_t");
          LlenarComboClient(ID_Cliente2,objData.client,objData.work.Cliente);

          document.querySelector("#id_t").value = objData.work.ID;
  
          $("#editarTrabajo").modal("show");
  
        } else {
          Swal.fire("Atención", objData.msg, objData.type);
        }
      }
    };
  }

  function LlenarCombo(combo, datos, seleccion) {
    combo.options.length = 0; // !Limpio los Datos de Combo o Select
    for (var i = 0; i < datos.length; i++) {
      var opcion = document.createElement("option");
      //! Tener en cuenta los  value y tex (ID y text) (tu ID y Nombre tiene que estar igual en tu base de datos)
      opcion.value = datos[i].ID;
      opcion.text = datos[i].Nombre;
      if (datos[i].ID === seleccion) {
        seleccion = i;
        a = i;
      }

      combo.add(opcion);
    }
    combo.selectedIndex = seleccion;
    seleccion = 0;
  }

  function LlenarComboClient(combo, datos, seleccion){
    combo.options.length = 0; // !Limpio los Datos de Combo o Select
    for (var i = 0; i < datos.length; i++) {
      var opcion = document.createElement("option");
      //! Tener en cuenta los  value y tex (ID y text) (tu ID y Nombre tiene que estar igual en tu base de datos)
      opcion.value = datos[i].ID;
      opcion.text = datos[i].N_Cliente;
      if (datos[i].ID === seleccion) {
        seleccion = i;
        a = i;
      }

      combo.add(opcion);
    }
    combo.selectedIndex = seleccion;
    seleccion = 0;
  }

