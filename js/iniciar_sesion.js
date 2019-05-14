const boton_inicio = document.getElementById("boton-inicio");
const email_inicio  = document.getElementById("email-inicio");
const pwd_inicio    = document.getElementById("pwd-inicio");

boton_inicio.addEventListener("click", (e) =>{
    e.preventDefault();

    let correo = email_inicio.value;
    let passwd = pwd_inicio.value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST',"../iniciar_sesion.php");
    xhr.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    xhr.send(JSON.stringify({
                                "correo"  : correo,
                                "password": passwd
                            }));

    xhr.onload = function(){
        if(xhr.response == correo){
            window.location.href = "principal";
        }
        console.log(xhr.response);
    }

});