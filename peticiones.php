<?php 
require_once 'modelo/comentarios.php';

// Routing
if (isset($_GET['peticion']))
    $peticion = $_GET['peticion'];

function palabras(){
    return pedirPalabrasProhibidas();
}

function enviarComentario($datos){
    $valores = json_decode($datos);
    addComentario($valores->id_evento,$valores->ip_usuario,$valores->nombre,$valores->correo,$valores->mensaje);
}

switch($peticion){
    case 'palabras':
        echo palabras();
        break;
    case 'addComentario':
        $datos = file_get_contents('php://input');
        enviarComentario($datos);
        break;
    case 'usuarios':
        echo usuarios();
    default:
        http_response_code(404);
        break;
}