<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";

// devuelve los comentarios de la base de datos en formato JSON
function pedirComentarios($id_evento){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_evento = $mysqli->real_escape_string($id_evento);

    $peticion = $mysqli->query("SELECT * FROM comentarios WHERE id_evento='$id_evento';");
    $comentarios = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $comentarios[$i] = $fila;
        $i++;
    }

    return $comentarios;
}

function pedirTodosComentarios(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM comentarios;");
    $comentarios = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $comentarios[$i] = $fila;
        $i++;
    }

    return $comentarios;
}

function pedirPalabrasProhibidas(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT * FROM palabras_prohibidas;");
    $palabras = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $palabras[$i] = $fila['palabra'];
        $i++;
    }

    return json_encode($palabras);
}

// añade a la base de datos un nuevo comentario
function addComentario($id_evento,$ip_usuario,$nombre,$correo,$texto){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_evento = $mysqli->real_escape_string($id_evento);
    $ip_usuario = $mysqli->real_escape_string($ip_usuario);
    $nombre = $mysqli->real_escape_string($nombre);
    $correo = $mysqli->real_escape_string($correo);
    $texto = $mysqli->real_escape_string($texto);

    // utilizar SQL Prepared Statements
    // evita el uso de inyección de SQL y mejora la eficiencia de las sentencias
    // Compila, optimiza la sentencia y la guarda en caché antes de ejecutarla
    // los valores ? son tratados como puros datos y la sentencia nunca se compila de nuevo
    $sentencia = $mysqli->prepare("INSERT INTO comentarios (id_evento,ip_usuario,nombre,correo,fecha,texto) VALUES(?,?,?,?,NOW(),?)");
    $sentencia->bind_param("issss",$id_evento,$ip_usuario,$nombre,$correo,$texto);
    $sentencia->execute();
}

function editarComentario($id_evento,$id_comentario,$nuevo_texto,$moderador){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);
    $id_comentario = $mysqli->real_escape_string($id_comentario);
    $nuevo_texto = $mysqli->real_escape_string($nuevo_texto);
    $moderador = $mysqli->real_escape_string($moderador);

    $sentencia = $mysqli->prepare("UPDATE comentarios SET texto=?,editado=? WHERE id_evento=? AND id_comentario=?");
    $sentencia->bind_param("ssii",$nuevo_texto,$moderador,$id_evento,$id_comentario);
    $sentencia->execute();
}

function pedirEliminarComentario($id_evento,$id_comentario){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);
    $id_comentario = $mysqli->real_escape_string($id_comentario);

    $sentencia = $mysqli->prepare("DELETE FROM comentarios WHERE id_evento=? AND id_comentario=?");
    $sentencia->bind_param("ss",$id_evento,$id_comentario);
    $sentencia->execute();
}

?>