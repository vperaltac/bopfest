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
            "nombre" => $_SESSION["nombre"],
            "id_usuario" => $_SESSION["id_usuario"]
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

function todosEventos(){
    return pedirTodosEventos();
}

function etiquetas(){
    return pedirEtiquetasEventos();
}

function todosUsuarios(){
    return pedirUsuarios();
}

function palabras(){
    return pedirPalabrasProhibidas();
}

function enviarComentario($id_evento,$datos){
    $valores = json_decode($datos);
    addComentario($id_evento,$valores->ip_usuario,$valores->nombre,$valores->correo,$valores->mensaje);
}