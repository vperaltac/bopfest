const botonRegistro   = document.getElementById("boton-registro");
const email_registro  = document.getElementById("email-registro");
const pwd_registro    = document.getElementById("pwd-registro");
const pwdr_registro   = document.getElementById("pwdr-registro");
const nombre_registro = document.getElementById("nombre-registro");

//Comprueba que un email es correcto
function validarEmail(email) {
    let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

botonRegistro.addEventListener("click", (e) =>{
    e.preventDefault();

    let correo = email_registro.value;
    let passwd = pwdr_registro.value;
    let nombre = nombre_registro.value;

    if(email_registro.value == "" || pwd_registro.value == "" || pwdr_registro.value == "" || nombre_registro.value == "")
        alert("¡Algun campo está vacio!")
    else if(pwd_registro.value != pwdr_registro.value)
        alert("Las contraseñas no coinciden")
    else if (!validarEmail(email_registro.value))
        alert("¡Email no correcto!")


    let xhr = new XMLHttpRequest();
    xhr.open('POST',"../registro.php?registro=1");
    xhr.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    xhr.send(JSON.stringify({
                                "correo"  : correo,
                                "nombre"  : nombre,
                                "password": passwd
                            }));

    xhr.onload = function(){
        if(xhr.response == "Correcto"){
            email_registro.value = "";
            pwd_registro.value = "";
            pwdr_registro.value = "";
            nombre_registro.value = "";

            alert("Usuario registrado correctamente");
        }
        else
            alert(xhr.response);
    }

});

