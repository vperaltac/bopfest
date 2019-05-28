const btnEditar      = document.getElementById("editar-evento");
const btnGuardar     = document.getElementById("guardar-evento");
const inTitulo       = document.getElementById("inTitulo");
const inOrganizador  = document.getElementById("inOrganizador");
const inFecha        = document.getElementById("inFecha");
const inTexto        = document.getElementById("inTexto");
const inImgTitulo1   = document.getElementById("inImgTitulo1");
const inImgCreditos1 = document.getElementById("inImgCreditos1");
const inImgTitulo2   = document.getElementById("inImgTitulo2");
const inImgCreditos2 = document.getElementById("inImgCreditos2");
const organizador    = document.getElementById("organizador");
const fecha          = document.getElementById("fecha");
const texto          = document.getElementById("texto");
const tituloImg1     = document.getElementById("tituloImg1");
const creditosImg1   = document.getElementById("creditosImg1");
const tituloImg2     = document.getElementById("tituloImg2");
const creditosImg2   = document.getElementById("creditosImg2");
const formImg1       = document.getElementById("form-img1");
const formImg2       = document.getElementById("form-img2");
const imagen1 = document.getElementById('img1');
const imagen2 = document.getElementById('img2');

const img1_evento = document.getElementById('img1-evento');
const img2_evento = document.getElementById('img2-evento');


console.log(formImg1);
console.log(formImg2);


if(btnEditar){
    btnEditar.onclick = function(){
        formImg1.style.display = "block";
        formImg2.style.display = "block";
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
        let img1 = imagen1.files[0];
        let img2 = imagen2.files[0];

        if(img1 && img2){
            let formImg1 = new FormData();
            formImg1.append('img1',img1);
            let enviarImg1 = new XMLHttpRequest();
            enviarImg1.open('POST',"subir-imagen/img1");
            enviarImg1.send(formImg1);
            enviarImg1.onload = function(){
                let dir_img1 = enviarImg1.response;
                let id_imagen1 = img1_evento.dataset.idImagen;
                let id_imagen2 = img2_evento.dataset.idImagen;

                let formImg2 = new FormData();
                formImg2.append('img2',img2);
                let enviarImg2 = new XMLHttpRequest();
                enviarImg2.open('POST',"subir-imagen/img2");
                enviarImg2.send(formImg2);
                enviarImg2.onload = function(){
                    let dir_img2 = enviarImg2.response;
                    let dir_imgs = {'dir_img1': dir_img1, 'dir_img2':dir_img2, 'id_imagen1':id_imagen1, 'id_imagen2':id_imagen2};

                    editarEvento(dir_imgs);
                }            
            }
        }
        else if(img1){
            let formImg1 = new FormData();
            formImg1.append('img1',img1);
            let enviarImg1 = new XMLHttpRequest();
            enviarImg1.open('POST',"subir-imagen/img1");
            enviarImg1.send(formImg1);
            enviarImg1.onload = function(){
                dir_img1 = enviarImg1.response;
                let dir_imgs = {'dir_img1': dir_img1};
                editarEvento(dir_imgs);
            }
        }
        else if(img2){
            let formImg2 = new FormData();
            formImg2.append('img2',img2);
            let enviarImg2 = new XMLHttpRequest();
            enviarImg2.open('POST',"subir-imagen/img2");
            enviarImg2.send(formImg2);
            enviarImg2.onload = function(){
                let dir_img2 = enviarImg2.response;
                let dir_imgs = {'dir_img2':dir_img2};

                editarEvento(dir_imgs);
            }
        }
        else{
            editarEvento(null);
        }
    }
}

function editarEvento(dir_imgs){
    let edit_titulo_evento = document.getElementById("editar-titulo-evento").value;
    let edit_organizador   = document.getElementById("editar-organizador").value;
    let edit_fecha         = document.getElementById("editar-fecha-evento").value;
    let edit_texto         = document.getElementById("editar-texto-evento").value;

    let titulo_imagen1   = document.getElementById("editar-titulo-imagen1").value;
    let creditos_imagen1 = document.getElementById("editar-creditos-imagen1").value;
    let titulo_imagen2   = document.getElementById("editar-titulo-imagen2").value;
    let creditos_imagen2 = document.getElementById("editar-creditos-imagen2").value;

    let id_imagen1 = img1_evento.dataset.idImagen;
    let id_imagen2 = img2_evento.dataset.idImagen;

    let jsonEvento = {
        "titulo"            : edit_titulo_evento,
        "organizador"       : edit_organizador,
        "fecha"             : edit_fecha,
        "texto"             : edit_texto,
        "titulo_imagen1"    : titulo_imagen1,
        "creditos_imagen1"  : creditos_imagen1,
        "titulo_imagen2"    : titulo_imagen2,
        "creditos_imagen2"  : creditos_imagen2,
        'id_imagen1'        :id_imagen1,
        'id_imagen2'        :id_imagen2
    };

    if(dir_imgs)
        jsonEvento = Object.assign({}, jsonEvento, dir_imgs);

    let request = new XMLHttpRequest();
    request.open('PUT',"evento/" + idEvento[0].id );
    request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
    request.send(JSON.stringify(jsonEvento));

    request.onload = function(){
        if(request.response == "correcto"){
            window.location.href = "evento/" + idEvento[0].id;
        }
        else{
            console.log(request.response);
        }
    }

    formImg1.style.display = "none";
    formImg2.style.display = "none";
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