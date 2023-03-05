document.addEventListener('DOMContentLoaded',init);
function init(){
    const nav = document.querySelector("#nav-menu");
    nav.addEventListener("click",function(e){
        if(e.target.classList.contains("btn-menu")){
            let hermanos = getSiblings(e.target);
            hermanos.forEach(i => {
                i.classList.remove("active");
            })
            e.target.classList.add("active");
        }

    });


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