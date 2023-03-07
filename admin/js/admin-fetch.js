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
                    timer: 1500
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Hubo un error!!',
                    showConfirmButton: false,
                    timer: 1500
                  })

            }
        })    
    })





}