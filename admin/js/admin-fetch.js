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
            console.log(data);
        })    
    })





}