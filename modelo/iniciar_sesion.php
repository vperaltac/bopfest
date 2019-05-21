<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";

function iniciarSesion($correo,$passwd){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id_usuario,passwd FROM usuarios WHERE email='$correo';");

    if($peticion->num_rows === 0){
        echo "Usuario no existe";
    }
    else if($peticion->num_rows === 1){
        $row = $peticion->fetch_assoc();

        if(password_verify($passwd,$row['passwd'])){
            $mysqli->query("UPDATE usuarios SET conectado=TRUE where email='$correo';");
            echo $correo;
        }
        else
            echo "Contraseña incorrecta";
    }
    else
        echo "Existen múltiples usuarios con el mismo correo";
}

function pedirUsuario(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id_usuario FROM usuarios WHERE conectado=TRUE;");

    if($peticion->num_rows === 0){
        echo "Usuario no existe";
    }
    else if($peticion->num_rows === 1){
        $row = $peticion->fetch_assoc();

        return $row['id_usuario']; 
    }

    return "none";
}