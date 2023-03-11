document.addEventListener('DOMContentLoaded',init);
function init(){

    const formUsuario = document.querySelector("#formulario-usuario");
    formUsuario.addEventListener('submit', function(e){
        e.preventDefault();

        let datos = new FormData(formUsuario);
        fetch(`inc/modelos/modelo-acceso.php`, {
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
                        title: 'Iniciando Sesion...',
                        showConfirmButton: false,
                        timer: 1200,
                        heightAuto: false
                      }).then(() =>window.location.replace(`index.php`));

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuario o contraseña incorrectos',
                        showConfirmButton: false,
                        timer: 1200,
                        heightAuto: false
                      })

                }
            })

        
    });
    /* const btnBorrar = document.querySelectorAll(".btn-borrar");
    btnBorrar.forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            
            let datos = new FormData();
            datos.append("id_registro", btn.getAttribute("id_registro"));
            datos.append("id_usuario", btn.getAttribute("id_usuario"));

            datos.append("tipoAccion", "borrar");

            fetch(`inc/modelos/modelo-carritos.php`, {
                method: 'POST',
                body: datos
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    let respuesta = data.respuesta;
                    let nuevoTotal = data.nuevoTotal;

                    if (respuesta === "exito") {
                        
                        btn.parentElement.parentElement.remove();
                        document.querySelector("#totalCompra").textContent = `Total: $${nuevoTotal}`;
                        
                    } else {
                        
                    }
                })


        });

    })
 */
}