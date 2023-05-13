"use strict"

let galerias = document.getElementsByClassName("main-galeria");

for (let i = 0; i < galerias.length; i++) {
    setInterval(animacionGaleria(galerias[i], i), 100);
}

function animacionGaleria(galeria, pos) {
    setInterval(function() {
        if (window.scrollY >= (230 * (pos + 1))) {
            galeria.style.visibility = "visible";
            galeria.classList.add("fadeIn");
        }
    })
}