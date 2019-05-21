<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";

function desconectar($id_usuario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("UPDATE conexiones SET conectado=FALSE WHERE id_usuario='$id_usuario';");

    if($peticion)
        echo "Correcto";
    else
        echo "Error";
}