function verDatos(id) {
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/escuelas/editar/";
    let strData = "id=" + id;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);
  
        if (objData.status) {
          document.querySelector("#nombre_s").value = objData.school.Nombre;
          document.querySelector("#id_s").value = objData.school.ID;
  
          $("#editarEscuela").modal("show");
  
        } else {
          swal("Error", objData.msg, "error");
        }
      }
    };
  }