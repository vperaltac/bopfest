<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";


// registra un usuario en la base de datos
function pedirUsuarios(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id_usuario,nombre,email,tipo FROM usuarios;");
    $usuarios = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $usuarios[$i] = $fila;
        $i++;
    }

    return $usuarios;
}