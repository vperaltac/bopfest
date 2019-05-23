<?php 
require_once 'modelo/comentarios.php';
require_once 'modelo/eventos.php';
require_once 'modelo/usuarios.php';

// obtener datos sobre comentarios
function comentarios($id_evento){
    if(!is_int($id_evento))
        trigger_error("id de evento desconocido. ", E_USER_ERROR);

    return pedirComentarios($id_evento);
}

function todosComentarios() {
    return pedirTodosComentarios();
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
        'usuario' => usuario()
    ];

    if($imprimir){
        echo $entorno->renderizar("imprimir_evento.html",$variables);
    }
    else{
        $variables["galeria"] = galeria($id_evento);
        echo $entorno->renderizar("evento.html",$variables);
    }
}