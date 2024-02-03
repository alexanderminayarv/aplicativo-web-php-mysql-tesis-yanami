function verDatos(id) {
    let request = window.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/ventas/editar/";
    let strData = "id=" + id;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {   
 
                var ID_Cliente2 = document.getElementById("cliente_v");
                LlenarComboClient(ID_Cliente2, objData.client, objData.sale.Cliente);

                document.querySelector("#fecha_v").value = objData.sale.Fecha;

                var ID_Servicio2 = document.getElementById("servicio_dv");
                LlenarCombo(ID_Servicio2, objData.service, objData.sale.Servicio);

                document.querySelector("#precio_dv").value = objData.sale.PrecioVenta;
                document.querySelector("#pago_dv").value = objData.sale.Pago;
                document.querySelector("#descuento_dv").value = objData.sale.Descuento;

                var ID_Banco2 = document.getElementById("banco_dv");
                LlenarCombo(ID_Banco2, objData.bank, objData.sale.Banco);

                document.querySelector("#id_v").value = objData.sale.Venta;
                document.querySelector("#id_dv").value = objData.sale.ID;

                $("#editarVenta").modal("show");

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

function LlenarComboClient(combo, datos, seleccion) {
    combo.options.length = 0; // !Limpio los Datos de Combo o Select
    for (var i = 0; i < datos.length; i++) {
        var opcion = document.createElement("option");
        //! Tener en cuenta los  value y tex (ID y text) (tu ID y Nombre tiene que estar igual en tu base de datos)
        opcion.value = datos[i].ID;
        opcion.text = datos[i].Cliente;
        if (datos[i].ID === seleccion) {
            seleccion = i;
            a = i;
        }

        combo.add(opcion);
    }
    combo.selectedIndex = seleccion;
    seleccion = 0;
}
