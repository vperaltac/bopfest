<?php 
require_once 'modelo/comentarios.php';
require_once 'modelo/eventos.php';
require_once 'modelo/usuarios.php';
require_once "subir_imagen.php";
require_once "modelo/polaroids.php";

// obtener datos sobre comentarios
function comentarios($id_evento){
    if(!is_int($id_evento))
        trigger_error("id de evento desconocido. ", E_USER_ERROR);

    return pedirComentarios($id_evento);
}

// obtener datos sobre eventos
function evento($id_evento){
    if(!is_int($id_evento))
        trigger_error("id de evento desconocido. ", E_USER_ERROR);

    return pedirEventos($id_evento);
}

function imagenes($id_evento){
    return pedirImagenesEvento($id_evento);
}

function galeria($id_evento){
    return pedirImagenesGaleria($id_evento);
}

function renderizarEvento($id_evento,$imprimir){
    $entorno = Entorno::getInstancia();

    $variables = [
        'evento' => evento($id_evento),
        'imagenes' => imagenes($id_evento), 
        'comentarios' => comentarios($id_evento),
        'usuario' => comprobarUsuario()
    ];

    if($imprimir){
        echo $entorno->renderizar("imprimir_evento.html",$variables);
    }
    else{
        $variables["galeria"] = galeria($id_evento);
        echo $entorno->renderizar("evento.html",$variables);
    }
}

function pedirAddEvento($datos){
    $valores = json_decode($datos);
 
    $id_evento = addPolaroid($valores->dir_imagenP,$valores->titulo);
    addImagen($id_evento,$valores->dir_imagen1,$valores->titulo_imagen1,$valores->creditos_imagen1);
    addImagen($id_evento,$valores->dir_imagen2,$valores->titulo_imagen2,$valores->creditos_imagen2);
    addEvento($valores->titulo,$valores->organizador,$valores->descripcion);
}