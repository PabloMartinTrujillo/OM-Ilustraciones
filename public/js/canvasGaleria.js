"use strict"

let elemento = document.getElementById("lienzo");
let lienzo = elemento.getContext('2d');
lienzo.strokeRect(0,0,elemento.width,elemento.height);
let canvasW = 800;
let canvasH = 500;

let imagenes = document.getElementsByClassName("galeria-ver-img");  /* Todas las imágenes de la galeria */

let imagenW = imagenes[0].width+200;    /* Muestro la primera imagen en el canvas nada mas entrar */
let imagenH = imagenes[0].height+200;
let imagenX = (canvasW - imagenW) / 2;
let imagenY = (canvasH - imagenH) / 2;
let imagen = new Image();
imagen.src = imagenes[0].src;
lienzo.drawImage(imagen,imagenX,imagenY,imagenW,imagenH);

for(let i=0; i<imagenes.length; i++) {
    imagenes[i].addEventListener("click",mostrar);
}

function mostrar(e) {
    let imagenW = e.target.width+200;
    let imagenH = e.target.height+200;
    let imagenX = (canvasW - imagenW) / 2;
    let imagenY = (canvasH - imagenH) / 2;

    let imagen = new Image();
    imagen.src = e.target.src;

    lienzo.clearRect(0,0,canvasW,canvasH);
    imagen.onload = function() {
        lienzo.drawImage(imagen,imagenX,imagenY,imagenW,imagenH);
    }
}