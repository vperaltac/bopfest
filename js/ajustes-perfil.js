const cambiarNombre     = document.getElementById("btnNombre");
const nombre            = document.getElementById("nombre");
const formNombre        = document.getElementById("editar-nombre");
const btnCancelarNombre = document.getElementById("btn-cancelar-nombre");
const cambiarEmail      = document.getElementById("btnEmail");
const email             = document.getElementById("email");
const formEmail         = document.getElementById("editar-email");
const btnCancelarEmail  = document.getElementById("btn-cancelar-email");
const cambiarPass       = document.getElementById("btnPass");
const formPass          = document.getElementById("editar-pass");
const btnCancelarPass   = document.getElementById("btn-cancelar-pass");

// botones aceptar
const aceptarNombre     = document.getElementById("aceptar-nombre");
const aceptarEmail      = document.getElementById("aceptar-email");
const aceptarPasswd     = document.getElementById("aceptar-passwd");

const nuevoNombre       = document.getElementById("nombre-usuario");
const nuevoCorreo       = document.getElementById("email-usuario");
const correoId          = document.getElementById("formulario-inicio").dataset.email;
const id_usuario        = document.getElementById("formulario-inicio").dataset.id;

const pwd_antigua       = document.getElementById("pwd-antigua");
const pwd_nueva         = document.getElementById("pwd-nueva");
const pwd_nueva2        = document.getElementById("pwd-nueva2");


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

aceptarNombre.onclick = function(){
    let request = new XMLHttpRequest();
    request.open('PUT',"usuarios/" + id_usuario + "/nombre");
    request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    request.send(JSON.stringify({
                                "nombre"     : nuevoNombre.value
                            }));
    request.onload = function(){
        window.location.href = "perfil";
    }
}

aceptarEmail.onclick = function(){
    let request = new XMLHttpRequest();
    request.open('PUT',"usuarios/" + id_usuario + "/correo");
    request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    request.send(JSON.stringify({
                                "email"     : nuevoCorreo.value
                            }));
    request.onload = function(){
        window.location.href = "perfil";
    }
}

aceptarPasswd.onclick = function(){
    if(pwd_nueva.value != pwd_nueva2.value){
        alert("Las contraseñas no coinciden");
    }
    else{
        let request = new XMLHttpRequest();
        request.open('PUT',"usuarios/" + id_usuario + "/passwd");
        request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
        request.send(JSON.stringify({
                                    "password"     : pwd_nueva.value
                                }));
        request.onload = function(){
            console.log(request.response);
            //window.location.href = "perfil";
        }    
    }


}