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

    // comprobar usuario y contraseña en BD
    $inicio = iniciarSesion($datos->correo,$datos->password);

    if($inicio){
        // activar sesión
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Store data in session variables
        $_SESSION["conectado"] = true;
        $_SESSION["usuario"] = $datos->correo;         
    }
    else
        echo "Inicio de sesión incorrecto";
}

function pedirDesconectar(){
    // activar sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Eliminar la sesión
    session_destroy();
}



                   

