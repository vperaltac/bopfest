const abrirGaleria = document.getElementById("abrir-galeria");
const cerrarGaleria = document.getElementById("cerrar-galeria");
const anterior = document.getElementById("anterior");
const siguiente = document.getElementById("siguiente");

abrirGaleria.onclick = function() {
    document.getElementById('galeriaEvento').style.display = "block";
}

cerrarGaleria.onclick = function() {
    document.getElementById('galeriaEvento').style.display = "none";
}

anterior.onclick = function() {
    plusSlides(-1);
}

siguiente.onclick = function() {
    plusSlides(1);
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("imagen-galeria");
    let dots = document.getElementsByClassName("demo");
    
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
}