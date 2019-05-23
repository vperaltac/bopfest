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