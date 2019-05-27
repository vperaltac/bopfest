<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function subirImagen($nombre){
    $imagen = $_FILES[$nombre];
    $imagen_arr = explode('.',$imagen['name']);
    $imagen_formato = strtolower(end($imagen_arr));
    $permitido = array('jpg','jpeg','png');

    if(in_array($imagen_formato,$permitido)){
        if($imagen['error'] == 0){
            if($imagen['size'] < 1000000){
                $nuevo_nombre = uniqid('',true).".".$imagen_formato;
                $destino = 'imgs/'.$nuevo_nombre;
                if(!move_uploaded_file($imagen['tmp_name'],$destino))
                    echo "Error al subir imagen";
            }
            else
                echo "El archivo es demasiado grande";
        }
        else
            echo "Error al subir la imagen";
    }
    else
        echo "Formato no permitido";

    return $destino;
}
?>