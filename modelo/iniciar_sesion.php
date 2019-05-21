<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";

function iniciarSesion($correo,$ip,$passwd){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id_usuario,passwd FROM usuarios WHERE email='$correo';");

    if($peticion->num_rows === 0){
        echo "Usuario no existe";
    }
    else if($peticion->num_rows === 1){
        $row = $peticion->fetch_assoc();
        $id  = $row['id_usuario'];

        if(password_verify($passwd,$row['passwd'])){
            $mysqli->query("INSERT INTO conexiones SELECT '$id','$ip',TRUE
                                            WHERE NOT EXISTS ( SELECT * FROM conexiones WHERE id_usuario='$id');");

            $mysqli->query("UPDATE conexiones SET conectado=TRUE WHERE id_usuario='$id';");

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

    $peticion = $mysqli->query("SELECT id_usuario FROM conexiones WHERE conectado=TRUE;");

    if($peticion->num_rows === 1){
        $row = $peticion->fetch_assoc();

        $id = $row['id_usuario'];
        $peticionUser = $mysqli->query("SELECT id_usuario,nombre,email,tipo FROM usuarios WHERE id_usuario='$id'");
        
        $usuario = $peticionUser->fetch_assoc();
        
        return $usuario;
    }

    return "none";
}

function pedirCerrarSesiones(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM conexiones WHERE conectado=TRUE;");

    if($peticion->num_rows > 1)
        $mysqli->query("UPDATE conexiones set conectado=FALSE");
}