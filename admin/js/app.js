document.addEventListener('DOMContentLoaded',init);
function init(){
    





















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