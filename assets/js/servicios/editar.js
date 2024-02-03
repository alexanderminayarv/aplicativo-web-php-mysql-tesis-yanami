function verDatos(id) {
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/servicios/editar/";
    let strData = "id=" + id;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);
  
        if (objData.status) {
          document.querySelector("#nombre_s").value = objData.service.Nombre;
          document.querySelector("#descripcion_s").value = objData.service.Descripcion;
          document.querySelector("#precio_s").value = objData.service.Precio;
          document.querySelector("#id_s").value = objData.service.ID;
  
          $("#editarServicio").modal("show");
  
        } else {
          swal("Error", objData.msg, "error");
        }
      }
    };
  }