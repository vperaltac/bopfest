const btnEditar = document.getElementById("editar-evento");
const btnGuardar = document.getElementById("guardar-evento");
const inTiutlo = document.getElementById("inTitulo");
const inOrganizador = document.getElementById("inOrganizador");
const inFecha = document.getElementById("inFecha");
const inTexto = document.getElementById("inTexto");
const inImgTitulo = document.getElementById("inImgTitulo");
const inImgCreditos = document.getElementById("inImgCreditos");
const organizador = document.getElementById("organizador");
const fecha = document.getElementById("fecha");
const texto = document.getElementById("texto");
const tituloImg = document.getElementById("tituloImg");
const creditosImg = document.getElementById("creditosImg");

btnEditar.onclick = function(){
    btnEditar.style.display = "none";
    btnGuardar.style.display = "block";
    inTiutlo.style.display = "block";
    inOrganizador.style.display = "block";
    inFecha.style.display = "block";
    inTexto.style.display = "block";
    inImgTitulo.style.display = "block";
    inImgCreditos.style.display = "block";
    organizador.style.display = "none";
    fecha.style.display = "none";
    texto.style.display = "none";
    tituloImg.style.display = "none";
    creditosImg.style.display = "none";
}

btnGuardar.onclick = function() {
    btnGuardar.style.display = "none";
    btnEditar.style.display = "block";
    inTiutlo.style.display = "none";
    inOrganizador.style.display = "none";
    inFecha.style.display = "none";
    inTexto.style.display = "none";
    inImgTitulo.style.display = "none";
    inImgCreditos.style.display = "none";
    organizador.style.display = "block";
    fecha.style.display = "block";
    texto.style.display = "block";
    tituloImg.style.display = "block";
    creditosImg.style.display = "block";
}