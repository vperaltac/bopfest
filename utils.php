<?php 
require_once 'modelo/usuarios.php';

function usuario(){
    return pedirUsuario();
}

function polaroids($etiqueta){
    return pedirPolaroids($etiqueta);
}

function todosComentarios() {
    return pedirTodosComentarios();
}

function todosUsuarios(){
    return pedirUsuarios();
}

function palabras(){
    return pedirPalabrasProhibidas();
}

function enviarComentario($datos){
    $valores = json_decode($datos);
    addComentario($valores->id_evento,$valores->ip_usuario,$valores->nombre,$valores->correo,$valores->mensaje);
}