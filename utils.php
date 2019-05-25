<?php 
require_once 'modelo/usuarios.php';

function usuario(){
    return pedirUsuario();
}

function comprobarUsuario(){
    // activar sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_SESSION["email"])){
        $usuario = array();
        $usuario = [
            "email" => $_SESSION["email"],
            "tipo" => $_SESSION["tipo"],
            "nombre" => $_SESSION["nombre"]
        ];
            
        return $usuario;
    }
    else
        return "anonimo";
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