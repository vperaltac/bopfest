<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";


// registra un usuario en la base de datos
function registrarUsuario($correo,$nombre,$hash){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id_usuario FROM usuarios WHERE email='$correo';");

    if($peticion->num_rows === 0){
        $correo = $mysqli->real_escape_string($correo);
        $tipo = "registrado";

        $sentencia = $mysqli->prepare("INSERT INTO usuarios (email,nombre,passwd,tipo) VALUES (?,?,?,?);");
        $sentencia->bind_param("ssss",$correo,$nombre,$hash,$tipo);
        $sentencia->execute();
    }
    else{
        echo "El usuario ya existe";
    }
}