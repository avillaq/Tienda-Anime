document.addEventListener('DOMContentLoaded', init);
function init() {

    const formCarrito = document.querySelector("#formulario-carrito");
    if (formCarrito !== null) {
        formCarrito.addEventListener('submit', function (e) {
            e.preventDefault();

            /**Verificamos que el usuario este logeado */
            const btnSubmit = document.querySelector(".btn-submit");
            isLoggedIn = btnSubmit.getAttribute("isLoggedIn");
            if (isLoggedIn === "") {
                mostrarNotificacion("Necesitas iniciar sesion...", "error")
                return;
            }

            let datos = new FormData(formCarrito);
            fetch(`inc/modelos/modelo-carritos.php`, {
                method: 'POST',
                body: datos
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    let respuesta = data.respuesta;

                    if (respuesta === "exito") {
                        mostrarNotificacion("Añadido al carrito", "correcto")
                    } else {
                        mostrarNotificacion("Hubo un error!", "error")
                    }
                })


        });
    }

    //Notificacion en pantalla
    function mostrarNotificacion(mensaje, clase) {
        const notificacion = document.createElement("div");
        notificacion.classList.add(clase, "notificacion", "sombra");
        notificacion.textContent = mensaje;

        main = document.querySelector("main");
        main.appendChild(notificacion)

        //Ocultar y mostrar la notificacion

        notificacion.classList.add("visible");
        setTimeout(() => {
            notificacion.classList.remove("visible");
            setTimeout(() => {
                notificacion.remove();

            }, 500);
        }, 2000);
    }

    const btnBorrar = document.querySelectorAll(".btn-borrar");
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

                        mostrarNotificacion("Producto eliminado", "correcto")

                        btn.parentElement.parentElement.remove();
                        document.querySelector("#totalCompra").textContent = `Total: $${nuevoTotal}`;

                    } else {
                        mostrarNotificacion("Hubo un error!", "error")
                    }
                })


        });

    })

}