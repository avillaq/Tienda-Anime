document.addEventListener('DOMContentLoaded',init);
function init(){

    const contenedorBotones = document.querySelector("#contenedor-lista-crear");

    const contenedorLista = document.querySelector("#contenedor-lista");
    const contenedorAñadir = document.querySelector("#contenedor-añadir");


    contenedorBotones.addEventListener("click",function (e){
        e.preventDefault();
        toggleSelected(e);

        if(e.target.classList.contains("btn-lista")){
            contenedorLista.style = "display: block;";
            contenedorAñadir.style = "display: none;";
        }else{
            contenedorLista.style = "display: none;";
            contenedorAñadir.style = "display: flex;";
        }
    })
    
    function toggleSelected(e){
        let hermanos = getSiblings(e.target);
        hermanos.forEach(i => i.classList.remove("selected"))
        e.target.classList.add("selected");
    }

    function getSiblings(e) {
        let siblings = []; 

        let sibling  = e.parentNode.firstChild;

        while (sibling) {
            if (sibling.nodeType === 1 && sibling !== e) {
                siblings.push(sibling);
            }
            sibling = sibling.nextSibling;
        }
        return siblings;
    };



}