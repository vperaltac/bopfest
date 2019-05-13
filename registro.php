<?php 
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'modelo/registro.php';

$datos = json_decode(file_get_contents('php://input'));

// encriptar contraseña (Bcrypt)
$hash = password_hash($datos->password,PASSWORD_DEFAULT);
registrarUsuario($datos->correo,$hash);
