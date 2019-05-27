const btnEditar = document.getElementById("editar-evento");
const btnGuardar = document.getElementById("guardar-evento");
const inTitulo = document.getElementById("inTitulo");
const inOrganizador = document.getElementById("inOrganizador");
const inFecha = document.getElementById("inFecha");
const inTexto = document.getElementById("inTexto");
const inImgTitulo1 = document.getElementById("inImgTitulo1");
const inImgCreditos1 = document.getElementById("inImgCreditos1");
const inImgTitulo2 = document.getElementById("inImgTitulo2");
const inImgCreditos2 = document.getElementById("inImgCreditos2");
const organizador = document.getElementById("organizador");
const fecha = document.getElementById("fecha");
const texto = document.getElementById("texto");
const tituloImg1 = document.getElementById("tituloImg1");
const creditosImg1 = document.getElementById("creditosImg1");
const tituloImg2 = document.getElementById("tituloImg2");
const creditosImg2 = document.getElementById("creditosImg2");

if(btnEditar){
    btnEditar.onclick = function(){
        btnEditar.style.display = "none";
        btnGuardar.style.display = "block";
        inTitulo.style.display = "block";
        inOrganizador.style.display = "block";
        inFecha.style.display = "block";
        inTexto.style.display = "block";
        inImgTitulo1.style.display = "block";
        inImgCreditos1.style.display = "block";
        inImgTitulo2.style.display = "block";
        inImgCreditos2.style.display = "block";
        organizador.style.display = "none";
        fecha.style.display = "none";
        texto.style.display = "none";
        tituloImg1.style.display = "none";
        creditosImg1.style.display = "none";
        tituloImg2.style.display = "none";
        creditosImg2.style.display = "none";
    }
}


if(btnGuardar){
    btnGuardar.onclick = function() {
        let edit_titulo_evento = document.getElementById("editar-titulo-evento").value;
        let edit_organizador   = document.getElementById("editar-organizador").value;
        let edit_fecha         = document.getElementById("editar-fecha-evento").value;
        let edit_texto         = document.getElementById("editar-texto-evento").value;
    
        let titulo_imagen1   = document.getElementById("editar-titulo-imagen1").value;
        let creditos_imagen1 = document.getElementById("editar-creditos-imagen1").value;
        let titulo_imagen2   = document.getElementById("editar-titulo-imagen2").value;
        let creditos_imagen2 = document.getElementById("editar-creditos-imagen2").value;

        let request = new XMLHttpRequest();
        request.open('PUT',"evento/" + idEvento[0].id );
        request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
        request.send(JSON.stringify({
                                    "titulo"            : edit_titulo_evento,
                                    "organizador"       : edit_organizador,
                                    "fecha"             : edit_fecha,
                                    "texto"             : edit_texto,
                                    "titulo_imagen1"    : titulo_imagen1,
                                    "creditos_imagen1"  : creditos_imagen1,
                                    "titulo_imagen2"    : titulo_imagen2,
                                    "creditos_imagen2"  : creditos_imagen2
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
        inImgTitulo1.style.display = "none";
        inImgCreditos1.style.display = "none";
        inImgTitulo2.style.display = "none";
        inImgCreditos2.style.display = "none";
        organizador.style.display = "block";
        fecha.style.display = "block";
        texto.style.display = "block";
        tituloImg1.style.display = "block";
        creditosImg1.style.display = "block";
        tituloImg2.style.display = "block";
        creditosImg2.style.display = "block";
    }
}
