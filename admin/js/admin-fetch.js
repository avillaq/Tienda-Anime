document.addEventListener('DOMContentLoaded',init);
function init(){
    const formulario = document.querySelector("#formulario");
    formulario.addEventListener('submit',function(e){
        e.preventDefault();
        let datos = new FormData(formulario);
        
        fetch("inc/modelos/modelo-categorias.php",{
            method: 'POST',
            body:datos
        }).then(response => response.json()).then(data => {
            console.log(data);
        })    
    })





}