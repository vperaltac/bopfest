const cambiarNombre = document.getElementById("btnNombre");
const nombre = document.getElementById("nombre");
const formNombre = document.getElementById("editar-nombre");
const btnCancelarNombre = document.getElementById("btn-cancelar-nombre");
const cambiarEmail = document.getElementById("btnEmail");
const email = document.getElementById("email");
const formEmail = document.getElementById("editar-email");
const btnCancelarEmail = document.getElementById("btn-cancelar-email");
const cambiarPass = document.getElementById("btnPass");
const formPass = document.getElementById("editar-pass");
const btnCancelarPass = document.getElementById("btn-cancelar-pass");

cambiarNombre.onclick = function() {
    formNombre.style.display = "block";
    nombre.style.display = "none";
}

cambiarEmail.onclick = function() {
    formEmail.style.display = "block";
    email.style.display = "none";
}

cambiarPass.onclick = function() {
    formPass.style.display = "block";
}

btnCancelarNombre.onclick = function() {
    formNombre.style.display = "none";
    nombre.style.display = "block";
}

btnCancelarEmail.onclick = function() {
    formEmail.style.display = "none";
    email.style.display = "block";
}

btnCancelarPass.onclick = function() {
    formPass.style.display = "none";
}