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

function pedirImagenesGaleria($id_evento){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $id_evento = $mysqli->real_escape_string($id_evento);

    $peticion = $mysqli->query("SELECT * FROM galeria WHERE id_evento='$id_evento';");
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


function eliminarEvento($id_evento){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);

    $sentencia = $mysqli->prepare("DELETE FROM eventos WHERE id_evento=?");
    $sentencia->bind_param("i",$id_evento);
    $sentencia->execute();
}

function cambiarImagen($id_evento,$id_imagen,$imagen,$titulo,$creditos){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);
    $id_imagen = $mysqli->real_escape_string($id_imagen);
    $imagen = $mysqli->real_escape_string($imagen);
    $titulo = $mysqli->real_escape_string($titulo);
    $creditos = $mysqli->real_escape_string($creditos);

    $sentencia = $mysqli->prepare("UPDATE imagenes_eventos SET imagen=?,titulo=?,creditos=? WHERE id_evento=? AND id_imagen=$id_imagen");
    $sentencia->bind_param("sssii",$imagen,$titulo,$creditos,$id_evento,$id_imagen);
    $sentencia->execute();
}

function addImagen($id_evento,$imagen,$titulo,$creditos){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);
    $imagen = $mysqli->real_escape_string($imagen);
    $titulo = $mysqli->real_escape_string($titulo);
    $creditos = $mysqli->real_escape_string($creditos);

    $sentencia = $mysqli->prepare("INSERT INTO imagenes_eventos (id_evento,imagen,titulo,creditos) VALUES(?,?,?,?)");
    $sentencia->bind_param("sssii",$imagen,$titulo,$creditos,$id_evento,$id_imagen);
    $sentencia->execute(); 
}

function eliminarImagen($id_evento,$id_imagen){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);
    $id_imagen = $mysqli->real_escape_string($id_imagen);

    $sentencia = $mysqli->prepare("DELETE FROM imagenes_eventos WHERE id_evento=$id_evento AND id_imagen=$id_imagen");
    $sentencia->bind_param("ii",$id_evento,$id_imagen);
    $sentencia->execute(); 
}


function editarEvento($id_evento,$titulo,$organizador,$fecha,$texto,$url_video,$info_adicional){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);
    $titulo = $mysqli->real_escape_string($titulo);
    $organizador = $mysqli->real_escape_string($organizador);
    $fecha = $mysqli->real_escape_string($fecha);
    $texto = $mysqli->real_escape_string($texto);
    $url_video = $mysqli->real_escape_string($url_video);
    $info_adicional = $mysqli->real_escape_string($info_adicional);

    $sentencia = $mysqli->prepare("UPDATE eventos SET titulo=?,organizador=?,fecha=?,texto=?,url_video=?,info_adicional=? WHERE id_evento=?");
    $sentencia->bind_param("ssssssi",$titulo,$organizador,$fecha,$texto,$url_video,$info_adicional,$id_evento);
    $sentencia->execute();
}

function addEtiqueta($id_evento,$etiqueta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);

    $sentencia = $mysqli->prepare("INSERT INTO etiquetas_eventos VALUES (?,?);");
    $sentencia->bind_param("is",$id_evento,$etiqueta);
    $sentencia->execute();
}

function eliminarEtiqueta($id_evento,$etiqueta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $id_evento = $mysqli->real_escape_string($id_evento);
    $etiqueta = $mysqli->real_escape_string($etiqueta);


    $sentencia = $mysqli->prepare("DELETE FROM etiquetas_eventos WHERE id_evento=$id_evento AND etiqueta=$etiqueta");
    $sentencia->bind_param("is",$id_evento,$etiqueta);
    $sentencia->execute();
}
?>