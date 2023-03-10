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
            return; 
        }


        /** Por hacer... */
        alert("Loading...");


        
    });

}