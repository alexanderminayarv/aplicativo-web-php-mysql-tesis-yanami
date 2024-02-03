function actualizarDatos() {
    if (document.querySelector("#formularioActualizarVenta")) {
        let formLogin = document.querySelector("#formularioActualizarVenta");
        formLogin.onsubmit = function (e) {
            e.preventDefault();
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/ventas/actualizar';
            var formData = new FormData(formLogin);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState != 4) return;
                if (request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire({
                            position: 'center',
                            icon: objData.type,
                            title: objData.msg,
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                    } else {
                        Swal.fire("Atención", objData.msg, objData.type);
                    }
                } else {
                    Swal.fire("Atención", objData.msg, objData.type);
                }
                return false;
            }
        }
    }
};