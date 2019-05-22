<?php 
require_once 'vendor/autoload.php';
require_once 'modelo/comentarios.php';
require_once 'modelo/eventos.php';
require_once 'modelo/usuarios.php';


//$user = usuario();

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

function mostrarEvento($id_evento,$imprimir){
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig   = new \Twig\Environment($loader,[
        'debug' => 'true'
    ]);

    $twig->addExtension(new \Twig\Extension\DebugExtension());

    if(!$imprimir)
        echo $twig->render('evento.html', 
                           ['evento' => evento($id_evento),
                           'imagenes' => imagenes($id_evento), 
                           'comentarios' => comentarios($id_evento),
                           'galeria' => galeria($id_evento),
                           'usuario' => usuario()]);
    else
        echo $twig->render('imprimir_evento.html', 
                            ['evento' => evento($id_evento),
                            'imagenes' => imagenes($id_evento),
                            'comentarios' => comentarios($id_evento),
                            'usuario' => usuario()]);
    }