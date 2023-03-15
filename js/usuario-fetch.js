document.addEventListener('DOMContentLoaded',init);
function init(){

    const formUsuario = document.querySelector("#formulario-usuario");

    if(formUsuario != null){

        formUsuario.addEventListener('submit', function(e){
            e.preventDefault();

            let datos = new FormData(formUsuario);

            if (isValidLoginRegister(datos.get("tipoAccion"))) {
                mostrarNotificacion("Datos no validos", "error")
                return;
            }

            fetch(`inc/modelos/modelo-acceso.php`, {
                method: 'POST',
                body: datos
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    let respuesta = data.respuesta;

                    if (respuesta === "exito") {
                        let accion = data.accion;

                        if(accion === "login"){
                            let id = data.id;
                            Swal.fire({
                                icon: 'success',
                                title: 'Iniciando Sesion...',
                                showConfirmButton: false,
                                timer: 1200,
                                heightAuto: false
                            }).then(() =>{
                                if(id === "2"){
                                    window.location.replace(`admin/index.php`);
                                }else{
                                    window.location.replace(`index.php`);
                                }    
                            })

                        }else if(accion === "register"){
                            Swal.fire({
                                icon: 'success',
                                title: 'Usuario Registrado',
                                showConfirmButton: false,
                                timer: 1200,
                                heightAuto: false
                            }).then(() =>window.location.replace(`login.php`));
                        }
                    
                    }else if(respuesta === "error"){
                        let accion = data.accion;

                        if(accion === "login"){
                            Swal.fire({
                                icon: 'error',
                                title: 'Usuario o contraseña incorrectos',
                                showConfirmButton: false,
                                timer: 1500,
                                heightAuto: false
                            })
                        }
                        else if(accion === "register"){
                            Swal.fire({
                                icon: 'error',
                                title: 'Nombre de usuario ya registrado',
                                showConfirmButton: false,
                                timer: 1500,
                                heightAuto: false
                            })
                        }
                        

                    }
                })
            
        });

    }

    function isValidLoginRegister(accion) {
        let inputName = document.querySelector("#input-nombre").value;
        let inputPassword = document.querySelector("#input-password").value;

        if(accion === "login"){
            return inputName.trim()==="" || inputPassword.trim()==="";
        }else if(accion  === "register"){
            let inputCorreo = document.querySelector("#input-correo").value;
            let expresionRegular = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return inputName.trim()==="" || inputPassword.trim()==="" || !expresionRegular.test(inputCorreo);
        }
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

    const btnCerrarSesion = document.querySelector("#btnCerrarSesion");
    btnCerrarSesion.addEventListener("click", function(e) {
        e.preventDefault();
        
        let datos = new FormData();
        datos.append("tipoAccion", "loginOut");

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
                        title: 'Cerrando Sesion...',
                        showConfirmButton: false,
                        timer: 1200,
                        heightAuto: false
                      }).then(() =>window.location.replace(`index.php`));
                }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubo un error...',
                            showConfirmButton: false,
                            timer: 1500,
                            heightAuto: false
                        })

                }
            })
    })


}