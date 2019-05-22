<?php
require_once 'modelo/usuarios.php';

function pedirRegistrarUsuario(){
    $datos = json_decode(file_get_contents('php://input'));

    // encriptar contraseña (Bcrypt)
    $hash = password_hash($datos->password,PASSWORD_DEFAULT);
    registrarUsuario($datos->correo,$datos->nombre,$hash);    
}

function pedirIniciarSesion(){
    $datos = json_decode(file_get_contents('php://input'));

    // encriptar contraseña (Bcrypt)
    iniciarSesion($datos->correo,$datos->ip_usuario,$datos->password);
}

function pedirDesconectar(){
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            desconectar($datos->id_usuario);
            break;
    }
}


