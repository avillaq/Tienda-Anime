document.addEventListener('DOMContentLoaded',init);
function init(){
    
    ver_carrito = document.querySelector("#ver-carrito");
    ver_carrito.addEventListener('click',function(e){
        e.preventDefault();
        isLoggedIn = ver_carrito.getAttribute("isLoggedIn");
        if(isLoggedIn === "false"){ 
            /**Sweetalert2 */
            alert("Necesitas Iniciar sesion...");
            return; 
        }
        else{
            window.location = "carrito.php";
        }
    });


}