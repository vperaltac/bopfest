const botonRegistro = document.getElementById("boton-registro");
const email_inicio  = document.getElementById("email-inicio");
const pwd_inicio    = document.getElementById("pwd-inicio");
const email_registro= document.getElementById("email-registro");
const pwd_registro  = document.getElementById("pwd-registro");
const pwdr_registro = document.getElementById("pwdr-registro");

botonRegistro.addEventListener("click", (e) =>{
    e.preventDefault();

    let correo = email_registro.value;
    let passwd = pwdr_registro.value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST',"../registro.php?registro=1");
    xhr.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    xhr.send(JSON.stringify({
                                "correo"  : correo,
                                "password": passwd
                            }));

    xhr.onload = function(){
        console.log(xhr.response);
    }

});