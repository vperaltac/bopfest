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
        $_SESSION["email"] = $inicio["email"];         
        $_SESSION["tipo"]    = $inicio["tipo"];
        $_SESSION["nombre"]  = $inicio["nombre"];
        $_SESSION["id_usuario"] = $inicio["id_usuario"];
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

function pedirEditarNombre($id_usuario,$datos){
    $valores = json_decode($datos);

    editarNombre($id_usuario,$valores->nombre);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["nombre"] = $valores->nombre;
}

function pedirEditarEmail($id_usuario,$datos){
    $valores = json_decode($datos);

    editarEmail($id_usuario,$valores->email);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["email"] = $valores->email;

}

function pedirEditarPasswd($id_usuario,$datos){
    $valores = json_decode($datos);

    $hash = password_hash($valores->password,PASSWORD_DEFAULT);
    editarPasswd($id_usuario,$hash);
}

function pedirEditarRol($id_usuario,$datos){
    $valores = json_decode($datos);

    editarRol($id_usuario,$valores->rol);
}