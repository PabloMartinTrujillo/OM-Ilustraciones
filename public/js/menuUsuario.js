"use strict"

let perfil = document.getElementById("nav-img-profile");
let menu = document.getElementById("nav-menuUsuario");

let hidden = true;

perfil.addEventListener("click", desplegarMenu);

function desplegarMenu() {
    if (hidden) {
        menu.style.visibility = "visible";
        hidden = false;
    } else {
        menu.style.visibility = "hidden";
        hidden = true;
    }
}