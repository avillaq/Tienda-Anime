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
                let accion = data.accion;


                if (respuesta === "exito") {
                    if(accion === "login"){
                        Swal.fire({
                            icon: 'success',
                            title: 'Iniciando Sesion...',
                            showConfirmButton: false,
                            timer: 1200,
                            heightAuto: false
                          }).then(() =>window.location.replace(`index.php`));
                    }else if(accion === "register"){
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario Registrado',
                            showConfirmButton: false,
                            timer: 1200,
                            heightAuto: false
                          }).then(() =>window.location.replace(`login.php`));
                    }
                   
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuario o contraseña incorrectos',
                        showConfirmButton: false,
                        timer: 1500,
                        heightAuto: false
                      })

                }
            })

        
    });
}