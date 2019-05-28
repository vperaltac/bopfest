//Variables
const abrirComentarios = document.getElementById("abrir-comentarios");
const botonComentario = document.getElementById("boton-comentario");
const formulario  = document.getElementsByClassName("grupo-formulario");
const nombreForm = document.getElementById("nombre-form");
const emailForm  = document.getElementById("email-form");
const mensajeForm = document.getElementById("mensaje-form");
const idEvento = document.getElementsByClassName("titulo");
const btnEditarC = document.getElementById("editar-comentario");
const btnBorrarC = document.getElementById("borrar-comentario");
const inTextoE = document.getElementById("inTextoE");
const comentarios = document.getElementsByClassName("comentario");
const botonesBorrar = document.getElementsByClassName("btn-comentario");
const botonesEditar = document.getElementsByClassName("btn-editar");
const textosE = document.getElementsByClassName("grupo-formulario");
const botnesGuardar = document.getElementsByClassName("boton-guardar");
const btnGuardarC = document.getElementById("guardar-comentario");
const nuevosTextos = document.getElementsByClassName("nuevo-texto");
const moderador = document.getElementById("nombre-edit");

if(moderador)
    moderador.style.display = "none";

var prohibidas;

let botonComentariosActivo = false;

//Al pulsar Comentarios en la barra de navegacion aparece la zona de comentarios
abrirComentarios.onclick = function () {
    if(!botonComentariosActivo) {
        document.getElementById("zona-comentarios").style.width = "30%";
        document.body.style.marginRight = "30%";
        document.getElementById("abrir-comentarios").innerHTML = "Cerrar";
        botonComentariosActivo = true;
    }
    else {
        document.getElementById("zona-comentarios").style.width = "0";
        document.body.style.marginRight = "0";
        document.getElementById("abrir-comentarios").innerHTML = "Comentarios";
        botonComentariosActivo = false;
    }   
}

if(botonComentario){
    //Al pulsar el boton enviar, procesa y añade el comentario
    botonComentario.addEventListener("click", (e) =>{
        e.preventDefault(); // evitar que se refresque la página

        // crear objeto de imagen
        let imagen  = document.createElement("img");
        imagen.src = "../imgs/user.png";
        imagen.classList.add("imagen-comentario");

        // crear objeto de nombre
        let nombre  = document.createElement("h3");
        let correo  = document.createElement("p");
        let fecha   = document.createElement("p");
        let mensaje = document.createElement("p");


        if(nombreForm.value == "" || emailForm.value == "" || mensajeForm.value == "")
            alert("¡Algun campo está vacio!")
        else if (!validarEmail(emailForm.value))
            alert("¡Email no correcto!")
        else{
            // añadir contenido
            nombre.appendChild(document.createTextNode(`${nombreForm.value}`));
            fecha.appendChild(document.createTextNode(incluirFecha()));
            mensaje.appendChild(document.createTextNode(`${mensajeForm.value}`));

            // añadir clases
            nombre.classList.add("nombre-usuario");
            fecha.classList.add("fecha-usuario");
            mensaje.classList.add("comentario-usuario");

            // añadir div contenedor
            let comentarios_dinamicos = document.getElementById("comentarios-dyn");

            let comentario = document.createElement("div");
            comentario.classList.add("comentario");
            comentario.appendChild(imagen);
            comentario.appendChild(nombre);
            comentario.appendChild(fecha);
            comentario.appendChild(mensaje);

            comentarios_dinamicos.appendChild(comentario);

            let nombreEnvio = nombreForm.value;
            let correoEnvio = emailForm.value;
            let mensajeEnvio = mensajeForm.value;

            if (typeof(Storage) !== "undefined") {
                sessionStorage.setItem('usuario',nombreEnvio);
                sessionStorage.setItem('correo',correoEnvio);
            }

            // petición AJAX asíncrona 
            let xhr = new XMLHttpRequest();
            xhr.open('GET','https://ipapi.co/json/');
            xhr.send();
            xhr.onload = function(){
                let jsonip = JSON.parse(xhr.response);

                let request = new XMLHttpRequest();
                request.open('POST',"eventos/" + idEvento[0].id + "/comentarios/");
                request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
                request.send(JSON.stringify({
                                            "ip_usuario": jsonip.ip,
                                            "nombre"    : nombreEnvio,
                                            "correo"    : correoEnvio,
                                            "mensaje"   : mensajeEnvio
                                        }));
                request.onload = function(){
                    console.log(request.response);
                }
            }

            mensajeForm.value = "";
        }
    });

    //Se comprueba cada vez que levantas una tecla en el formulario si hay una palabra prohibida
mensajeForm.onkeyup = function () {
    comprobarMensaje(mensajeForm);
}

nombreForm.onkeyup = function () {
    comprobarMensaje(nombreForm);
}

emailForm.onkeyup = function () {
    comprobarMensaje(emailForm);
}

// uso de Sesiones/Storage HTML5
if (sessionStorage.getItem("usuario") != null) {
    nombreForm.value = sessionStorage.getItem("usuario");
}
  
if (sessionStorage.getItem("correo") != null) {
    emailForm.value = sessionStorage.getItem("correo");
}


}

//Comprueba que un email es correcto
function validarEmail(email) {
    let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

//Comprueba si en un texto hay una palabra prohibida
function comprobarMensaje(texto){
    // solo realizar peticion AJAX al servidor si la variable prohibidas aún no está definida
    if(!prohibidas){
        let xhr = new XMLHttpRequest();
        xhr.open('GET','palabras',true);
        xhr.send();

        xhr.onload = function(){
            prohibidas = JSON.parse(xhr.response);
            
            for(i in prohibidas){
                if(texto.value.includes(prohibidas[i]))
                    texto.value = texto.value.replace(prohibidas[i], marcarPalabraProhibida(prohibidas[i].length));
            }
        }
    }
    else{
        for(i in prohibidas){
            if(texto.value.includes(prohibidas[i]))
                texto.value = texto.value.replace(prohibidas[i], marcarPalabraProhibida(prohibidas[i].length));
        }
    }
}

//Añade los asteriscos segun la longitud de la palabra
function marcarPalabraProhibida(longitud) {
    let asteriscos = "";

    for(let i=0; i<longitud; i++)
        asteriscos += "*";

    return asteriscos;
}

//Funcion que devuelve la fecha y hora actual
function incluirFecha() {
    let fecha = new Date();

    let dia = fecha.getDate();
    let mes = fecha.getMonth()+1;
    let anyo = fecha.getFullYear();
    let hora = fecha.getHours();
    let min = (fecha.getMinutes()<10?"0":"") + fecha.getMinutes();

    let fechaCompleta = dia + "/" + mes +"/" + anyo + " a las " + hora + ":" + min;

    return fechaCompleta;
}


for(var i=0; i<botonesBorrar.length; i++){ 
    botonesBorrar[i].onclick = function(e){ 
        let posicion = e.path[0].dataset.index;
        let id_comentario = comentarios[posicion-1].dataset.idComentario;

        let request = new XMLHttpRequest();
        request.open('DELETE',"eventos/" + idEvento[0].id + "/comentarios/" + id_comentario);
        request.send(null);
        request.onload = function(){
            window.location.href = "evento/"+ idEvento[0].id;
        }

        comentarios[posicion-1].remove();
    } 
}

for(var i=0; i<botonesEditar.length; i++){ 
    botonesEditar[i].onclick = function(e){ 
        let posicion = e.path[0].dataset.index;
        let id_comentario = comentarios[posicion-1].dataset.idComentario;
        let editarTexo = textosE[posicion-1];
        let btnGuardar = botnesGuardar[posicion-1];
        editarTexo.style.display = "block";
        btnGuardar.style.display = "block";
    
<<<<<<< HEAD
        if(btnGuardar){
            btnGuardar.onclick = function(){
                let edit_mensaje = nuevosTextos[posicion].value;
                let edit_moderador   = moderador.value;
                let request = new XMLHttpRequest();
                request.open('PUT',"evento/" + idEvento[0].id + "/comentarios/" + id_comentario);
                request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
                request.send(JSON.stringify({
                                            "mensaje"       : edit_mensaje,
                                            "moderador"     : edit_moderador
                                        }));
                request.onload = function(){
                    if(request.response == "Comentario cambiado"){
                        window.location.href = "evento/"+idEvento[0].id;  
                    }
                }

                editarTexo.style.display = "none";
                btnGuardar.style.display = "none";
=======
        btnGuardar.onclick = function(){
            let edit_mensaje = nuevosTextos[posicion-1].value;
            let edit_moderador   = moderador.value;
            let request = new XMLHttpRequest();
            request.open('PUT',"evento/" + idEvento[0].id + "/comentarios/" + id_comentario);
            request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
            request.send(JSON.stringify({
                                        "mensaje"       : edit_mensaje,
                                        "moderador"     : edit_moderador
                                    }));
            request.onload = function(){
                window.location.href = "evento/"+ idEvento[0].id;
>>>>>>> b82fbbb3b5fb4b57a70bfb98d7000f1de427385e
            }

            editarTexo.style.display = "none";
            btnGuardar.style.display = "none";
        }        
    } 
}