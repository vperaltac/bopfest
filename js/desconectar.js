if(document.getElementById("desconectar")){
    const boton_desconectar = document.getElementById("desconectar");

    boton_desconectar.addEventListener("click", (e) =>{
        e.preventDefault();
        
        let request = new XMLHttpRequest();
        request.open('POST',"usuarios/1/desconectar");
        request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
        request.send();
    
        request.onload = function(){
            window.location.href = "principal";
        }
    });
}

