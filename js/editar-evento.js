const btnEditar = document.getElementById("editar-evento");
const btnGuardar = document.getElementById("guardar-evento");
const inTiutlo = document.getElementById("inTitulo");
const inOrganizador = document.getElementById("inOrganizador");
const inFecha = document.getElementById("inFecha");
const inTexto = document.getElementById("inTexto");
const inImgTitulo = document.getElementById("inImgTitulo");
const inImgCreditos = document.getElementById("inImgCreditos");


btnEditar.onclick = function(){
    btnEditar.style.display = "none";
    btnGuardar.style.display = "block";
    inTiutlo.style.display = "block";
    inOrganizador.style.display = "block";
    inFecha.style.display = "block";
    inTexto.style.display = "block";
    inImgTitulo.style.display = "block";
    inImgCreditos.style.display = "block";
}

btnGuardar.onclick = function() {
    btnGuardar.style.display = "none";
    btnEditar.style.display = "block";
}