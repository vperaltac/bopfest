const botonRegistro = document.getElementById("boton-registro");

botonRegistro.addEventListener("click", (e) =>{
    e.preventDefault();

    let correo = "victor@gmail.com";
    let passwd = "1234";

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