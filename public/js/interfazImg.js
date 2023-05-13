"use strict"

let imagenes = document.getElementsByClassName("flex-div"); // Estos son los divs
// donde están las imágenes
let interfaces = document.getElementsByClassName("galeria-imagen-interfaz");

console.log(imagenes);

for (let i = 0; i < imagenes.length; i++) {
    imagenes[i].addEventListener("mouseover", function() {
        interfaces[i].style.visibility = "visible";
    });
    imagenes[i].addEventListener("mouseout", function() {
        interfaces[i].style.visibility = "hidden";
    });
}