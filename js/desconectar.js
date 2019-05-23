if(document.getElementById("desconectar")){
    const boton_desconectar = document.getElementById("desconectar");

    boton_desconectar.addEventListener("click", (e) =>{
        e.preventDefault();
    
        id_usuario = boton_desconectar.dataset.usuarioId;
    
        let request = new XMLHttpRequest();
        request.open('POST',"usuarios/1/desconectar");
        request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
        request.send(JSON.stringify({
                                    "id_usuario" : id_usuario
                                }));
    
        request.onload = function(){
            if(request.response == "Correcto"){
                window.location.href = "principal";
            }
            else{
                console.log(request.response);
            }
        }
    });
}

