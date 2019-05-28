const boton_inicio = document.getElementById("boton-inicio");
const email_inicio  = document.getElementById("email-inicio");
const pwd_inicio    = document.getElementById("pwd-inicio");

boton_inicio.addEventListener("click", (e) =>{
    e.preventDefault();

    let correo = email_inicio.value;
    let passwd = pwd_inicio.value;

    let xhr = new XMLHttpRequest();
    xhr.open('GET','https://ipapi.co/json/');
    xhr.send();
    xhr.onload = function(){
        let jsonip = JSON.parse(xhr.response);

        let request = new XMLHttpRequest();
        request.open('POST',"usuarios/1/conectar");
        request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
        request.send(JSON.stringify({
                                    "correo"     : correo,
                                    "ip_usuario" : jsonip.ip,
                                    "password"   : passwd
                                }));
    
        request.onload = function(){
            if(request.response == "Login correcto"){
                window.location.href = "principal";
            }
            else{
                alert(request.response);
            }
        }
    }



});