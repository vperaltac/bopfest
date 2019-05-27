<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";

// devuelve los polaroids de la base de datos en formato JSON
function pedirPolaroids($etiqueta){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    if($etiqueta == 'all')
        $peticion = $mysqli->query("SELECT * FROM polaroids ORDER BY -id_evento DESC;");
    else
        $peticion = $mysqli->query("SELECT * FROM polaroids WHERE id_evento IN (SELECT id_evento FROM etiquetas_eventos WHERE etiqueta='$etiqueta')
                                    ORDER BY -id_evento DESC;");

    $polaroids = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $polaroids[$i] = $fila;
        $i++;
    }

    return $polaroids;
}

// añade a la base de datos un nuevo polaroid
function addPolaroid($imagen,$titulo){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    // real_escape_string añade \ junto a caracteres potencialmente peligrosos (\x00,\n,\r,\,'," y \x1a.)
    $imagen = $mysqli->real_escape_string($imagen);
    $titulo = $mysqli->real_escape_string($titulo);
    $id_evento = 11;

    $sentencia = $mysqli->prepare("INSERT INTO polaroids VALUES(?,?,?)");
    $sentencia->bind_param("ssi",$imagen,$titulo,$id_evento);
    $sentencia->execute();

    $peticion = $mysqli->query("SELECT id_evento FROM polaroids WHERE imagen='$imagen';");
    $row = $peticion->fetch_assoc();
    $id  = $row['id_evento'];

    return $id;
}
?>