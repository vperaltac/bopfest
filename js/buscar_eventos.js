const barraBusqueda = document.getElementById("busqueda");
const resultado = document.getElementById("resultado");

function busqueda(consulta) {
    let request = new XMLHttpRequest();
    request.open('POST', "consulta");
    request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    request.send(JSON.stringify({
                                "consulta"   : consulta,
                            }));
    request.onload = function(){
        let respuesta = JSON.parse(request.response);
        for(var i=0; i<respuesta.length; i++){
            console.log(respuesta[i].titulo);
        }
    }
}

barraBusqueda.onkeyup = function() {
    let texto = barraBusqueda.value;

    if(texto != ""){
        busqueda(texto);
    }
}