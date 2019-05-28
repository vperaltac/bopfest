const barraBusqueda = document.getElementById("busqueda");
const resultado = document.getElementById("resultado");

function busqueda(consulta) {
    let tipo = barraBusqueda.dataset.tipoUsuario;

    let request = new XMLHttpRequest();
    request.open('POST', "consulta");
    request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    request.send(JSON.stringify({
                                "consulta"   : consulta,
                                "tipo"       : tipo
                            }));
    request.onload = function(){
        let respuesta = JSON.parse(request.response);
        resultado.innerHTML = "";

        for(var i=0; i<respuesta.length; i++){

            // crear objeto de imagen
            let fila  = document.createElement("tr");

            // crear objeto de nombre
            let titulo  = document.createElement("td");
            let enlace = document.createElement("a");
            enlace.setAttribute('href', 'evento/' + respuesta[i].id_evento);

            // añadir contenido
            enlace.appendChild(document.createTextNode(respuesta[i].titulo));

            titulo.appendChild(enlace);
            fila.appendChild(titulo);
            resultado.appendChild(fila);
        }
    }
}

barraBusqueda.onkeyup = function() {
    let texto = barraBusqueda.value;

    if(texto != ""){
        busqueda(texto);
    }
    else{
        resultado.innerHTML = "";
    }
}