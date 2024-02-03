function verDatos(id) {
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/clientes/editar/";
    let strData = "id=" + id;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);
  
        if (objData.status) {
          document.querySelector("#DNI_c").value = objData.client.DNI;
          document.querySelector("#nombres_c").value = objData.client.Nombres;
          document.querySelector("#apellidos_c").value = objData.client.Apellidos;
          document.querySelector("#celular_c").value = objData.client.Celular;
          document.querySelector("#id_c").value = objData.client.ID;
  
          $("#editarCliente").modal("show");
  
        } else {
          swal("Error", objData.msg, "error");
        }
      }
    };
  }