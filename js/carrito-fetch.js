document.addEventListener('DOMContentLoaded',init);
function init(){

    const formCarrito = document.querySelector("#formulario-carrito");
    if(formCarrito !== null){
        formCarrito.addEventListener('submit', function(e){
            e.preventDefault();

            /**Verificamos que el usuario este logeado */
            const btnSubmit = document.querySelector(".btn-submit");
            isLoggedIn = btnSubmit.getAttribute("isLoggedIn");
            if(isLoggedIn === "false"){ 
                /**Sweetalert2 */
                alert("Necesitas Iniciar sesion...");
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
                        console.log("Añadido al carrito");

                    } else {
                        console.log("Error");

                    }
                })

            
        });
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
                        
                        btn.parentElement.parentElement.remove();
                        document.querySelector("#totalCompra").textContent = `Total: $${nuevoTotal}`;
                        
                    } else {
                        
                    }
                })


        });

    })

}