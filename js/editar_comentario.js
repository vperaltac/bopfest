const btnEditarC = document.getElementById("editar-comentario");
const btnBorrarC = document.getElementById("borrar-comentario");
const btnGuardarC = document.getElementById("guardar-comentario");
const inTextoE = document.getElementById("inTextoE");

btnEditarC.onclick = function() {
    inTextoE.style.display = "block";
    btnGuardarC.style.display = "block";
}