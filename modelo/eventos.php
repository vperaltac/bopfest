<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";

// devuelve los eventos de la base de datos en formato JSON
function pedirEventos($id_evento){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_evento = $mysqli->real_escape_string($id_evento);

    $peticion = $mysqli->query("SELECT * FROM eventos WHERE id_evento='$id_evento';");
    return $peticion->fetch_assoc();
}


function pedirImagenesEvento($id_evento){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_evento = $mysqli->real_escape_string($id_evento);

    $peticion = $mysqli->query("SELECT * FROM imagenes_eventos WHERE id_evento='$id_evento';");
    $imagenes = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $imagenes[$i] = $fila;
        $i++;
    }

    return $imagenes;
}

// añade a la base de datos un nuevo evento
function addEvento($titulo,$organizador,$texto){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $titulo = $mysqli->real_escape_string($titulo);
    $organizador = $mysqli->real_escape_string($organizador);
    $texto = $mysqli->real_escape_string($texto);

    $sentencia = $mysqli->prepare("INSERT INTO eventos (titulo,organizador,fecha,texto) VALUES(?,?,NOW(),?)");
    $sentencia->bind_param("sss",$titulo,$organizador,$texto);
    $sentencia->execute();
}
?>