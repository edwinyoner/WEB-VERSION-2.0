var visible = false;

function iniciar(){
    var elemento = document.getElementById("menu-img");
    elemento.addEventListener("click", mostrarMenu);
}

function mostrarMenu(){
    var elemento = document.getElementById("nav-main");
    if(!visible){
        elemento.style.display = "flex";
        visible = true;
        //var elemento = document.getElementById("menu-img");
        //elemento.addEventListener("click", desplazar);
    }
    else{
        elemento.style.display = "none";
        visible = false;
        //var elemento = document.getElementById("menu-img");
        //elemento.addEventListener("click", encoger);
    }
}

window.addEventListener("load", iniciar);