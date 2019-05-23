<?php 
require_once 'modelo/comentarios.php';
require_once 'modelo/eventos.php';

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

function addEvento($datos){
    $valores = json_decode($datos);
    addEvento($valores->titulo,$valores->organizador,$valores->descripción);
}

switch($peticion){
    case 'palabras':
        echo palabras();
        break;
    case 'addComentario':
        $datos = file_get_contents('php://input');
        enviarComentario($datos);
        break;
    case 'eliminarComentario':
        $datos = file_get_contents('php://input');
        eliminarComentario($datos);
    case 'addEveto':
        $datos = file_get_contents('php://input');
        addEvento($datos);
        break;
    default:
        http_response_code(404);
        break;
}