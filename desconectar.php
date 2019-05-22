<?php 
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'modelo/desconectar.php';

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        desconectar($datos->id_usuario);
        break;
}