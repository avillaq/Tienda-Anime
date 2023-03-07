document.addEventListener('DOMContentLoaded', init);
function init() {

    const formularioArchivos = document.querySelector("#formulario-archivos");
    formularioArchivos.addEventListener('submit', function (e) {
        e.preventDefault();
        let datos = new FormData(formularioArchivos);

        fetch(`inc/modelos/modelo-${datos.get("tipoOpcion")}.php`, {
            method: 'POST',
            //mode:"cors", //Opcional
            cache: "no-cache",  //Opcional
            body: datos
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let respuesta = data.respuesta;
                if (respuesta === "exito") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Creado correctamente',
                        showConfirmButton: false,
                        heightAuto: false,
                        timer: 1200
                    }).then(() => window.location.href = `${datos.get("tipoOpcion")}.php`);

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un error!',
                        showConfirmButton: false,
                        heightAuto: false,
                        timer: 1500
                    })

                }
            })
    })

    const btnBorrar = document.querySelectorAll(".btn-borrar");
    btnBorrar.forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estas seguro?',
                text: "Esto es irreversible!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {

                    let datos = new FormData();
                    datos.append("id_registro", btn.getAttribute("id_registro"));
                    datos.append("tipoAccion", "borrar");

                    fetch(`inc/modelos/modelo-${btn.getAttribute("tipoOpcion")}.php`, {
                        method: 'POST',
                        body: datos
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            let respuesta = data.respuesta;
                            if (respuesta === "exito") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Eliminado',
                                    showConfirmButton: false,
                                    heightAuto: false,
                                    timer: 1000
                                })
                                btn.parentElement.parentElement.remove();

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Hubo un error!!',
                                    showConfirmButton: false,
                                    heightAuto: false,
                                    timer: 1500
                                })
                            }
                        })
    
                }
            })

        })
    })
}