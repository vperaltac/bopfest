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

// devuelve los eventos de la base de datos en formato JSON
function pedirEventos($id_evento){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_evento = $mysqli->real_escape_string($id_evento);

    $peticion = $mysqli->query("SELECT * FROM eventos WHERE id_evento='$id_evento';");
    return $peticion->fetch_assoc();
}

// devuelve los polaroids de la base de datos en formato JSON
function pedirPolaroids($etiqueta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    if($etiqueta == 'all'){
        $peticion = $mysqli->query("SELECT * FROM polaroids ORDER BY -id_evento DESC;");
    }
    else{
        $peticion = $mysqli->query("SELECT * FROM polaroids WHERE etiqueta='$etiqueta' ORDER BY -id_evento DESC;");
    }

    $polaroids = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $polaroids[$i] = $fila;
        $i++;
    }

    return $polaroids;
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

// añade a la base de datos un nuevo polaroid
function addPolaroid($imagen,$titulo,$enlace){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $imagen = $mysqli->real_escape_string($imagen);
    $titulo = $mysqli->real_escape_string($titulo);
    $enlace = $mysqli->real_escape_string($enlace);

    $sentencia = $mysqli->prepare("INSERT INTO polaroids VALUES(?,?,?)");
    $sentencia->bind_param("sss",$imagen,$titulo,$enlace);
    $sentencia->execute();
}
?>