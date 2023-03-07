document.addEventListener('DOMContentLoaded',init);
function init(){

    const formularioArchivos = document.querySelector("#formulario-archivos");
    formularioArchivos.addEventListener('submit',function(e){
        e.preventDefault();
        let datos = new FormData(formularioArchivos);

        fetch(`inc/modelos/modelo-${datos.get("tipoOpcion")}.php`,{
            method: 'POST',
            //mode:"cors", //Opcional
            cache: "no-cache",  //Opcional
            body:datos
        })
        .then(response => response.json())
        .then(data => {
            let respuesta = data.respuesta;
            if(respuesta === "exito"){
                Swal.fire({
                    icon: 'success',
                    title: 'Se guardo correctamente',
                    showConfirmButton: false,
                    heightAuto: false,
                    timer: 1500
                  }).then(() =>window.location.href = `${datos.get("tipoOpcion")}.php`);

            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Hubo un error!!',
                    showConfirmButton: false,
                    heightAuto: false,
                    timer: 1500
                  })

            }
        })    
    })

    const btnBorrar = document.querySelectorAll(".btn-borrar");
    btnBorrar.forEach(function(btn){
        btn.addEventListener("click", function(e){
            e.preventDefault();
    
            let datos = new FormData();
            datos.append("id_registro",btn.getAttribute("id_registro"));
            datos.append("tipoAccion","borrar");
    
            fetch(`inc/modelos/modelo-${btn.getAttribute("tipoOpcion")}.php`,{
                method: 'POST',
                body:datos
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let respuesta = data.respuesta;
                if(respuesta === "exito"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Se guardo correctamente',
                        showConfirmButton: false,
                        heightAuto: false,
                        timer: 1500
                      });
    
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un error!!',
                        showConfirmButton: false,
                        heightAuto: false,
                        timer: 1500
                      })
                }
            })    
    
        })
    })
}