document.addEventListener('DOMContentLoaded',init);
function init(){

    const formCarrito = document.querySelector("#formulario-carrito");

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