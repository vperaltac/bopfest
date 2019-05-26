const btnEditar = document.getElementById("editar-evento");
const btnGuardar = document.getElementById("guardar-evento");
const inTitulo = document.getElementById("inTitulo");
const inOrganizador = document.getElementById("inOrganizador");
const inFecha = document.getElementById("inFecha");
const inTexto = document.getElementById("inTexto");
const inImgTitulo = document.getElementById("inImgTitulo");
const inImgCreditos = document.getElementById("inImgCreditos");
const organizador = document.getElementById("organizador");
const fecha = document.getElementById("fecha");
const texto = document.getElementById("texto");
const tituloImg = document.getElementById("tituloImg");
const creditosImg = document.getElementById("creditosImg");

btnEditar.onclick = function(){
    btnEditar.style.display = "none";
    btnGuardar.style.display = "block";
    inTitulo.style.display = "block";
    inOrganizador.style.display = "block";
    inFecha.style.display = "block";
    inTexto.style.display = "block";
    inImgTitulo.style.display = "block";
    inImgCreditos.style.display = "block";
    organizador.style.display = "none";
    fecha.style.display = "none";
    texto.style.display = "none";
    tituloImg.style.display = "none";
    creditosImg.style.display = "none";
}

btnGuardar.onclick = function() {
    let edit_titulo_evento = document.getElementById("editar-titulo-evento").value;
    let edit_organizador   = document.getElementById("editar-organizador").value;
    let edit_fecha         = document.getElementById("editar-fecha-evento").value;
    let edit_texto         = document.getElementById("editar-texto-evento").value;

    let titulo_imagen   = document.getElementById("editar-titulo-imagen").value;
    let creditos_imagen = document.getElementById("editar-creditos-imagen").value;

    let request = new XMLHttpRequest();
    request.open('PUT',"evento/" + idEvento[0].id );
    request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    request.send(JSON.stringify({
                                "titulo"            : edit_titulo_evento,
                                "organizador"       : edit_organizador,
                                "fecha"             : edit_fecha,
                                "texto"             : edit_texto
                            }));

    request.onload = function(){
        if(request.response == "correcto"){
            window.location.href = "evento/" + idEvento[0].id;
        }
        else{
            console.log(request.response);
        }
    }

    btnGuardar.style.display = "none";
    btnEditar.style.display = "block";
    inTitulo.style.display = "none";
    inOrganizador.style.display = "none";
    inFecha.style.display = "none";
    inTexto.style.display = "none";
    inImgTitulo.style.display = "none";
    inImgCreditos.style.display = "none";
    organizador.style.display = "block";
    fecha.style.display = "block";
    texto.style.display = "block";
    tituloImg.style.display = "block";
    creditosImg.style.display = "block";
}