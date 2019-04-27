<?php 
require 'vendor/autoload.php';
require_once 'modelo/peticiones.php';

// Routing
$dir = 'principal';
if (isset($_GET['dir'])){
    $dir = $_GET['dir'];
}


$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig   = new \Twig\Environment($loader,[ ]);

// obtener datos sobre polaroids (pagina principal)
function polaroids(){
    return pedirPolaroids();
}

// obtener datos sobre comentarios
function comentarios($id_evento){
    if(!is_int($id_evento)){
        trigger_error("id de evento desconocido. ", E_USER_ERROR);
    }

    return pedirComentarios($id_evento);
}

// obtener datos sobre eventos
function evento($id_evento){
    if(!is_int($id_evento)){
        trigger_error("id de evento desconocido. ", E_USER_ERROR);
    }

    return pedirEventos($id_evento);
}

function imagenes($id_evento){
    return pedirImagenesEvento($id_evento);
}


switch($dir){
    case 'principal':
        echo $twig->render('principal.html', ['polaroids' => polaroids()]);
        break;
    case 'evento':
        if(isset($_GET['evento'])){
            $evento = (int)$_GET['evento'];
        }
        echo $twig->render('evento.html', ['evento' => evento($evento),'imagenes' => imagenes($evento), 'comentarios' => comentarios($evento)]);    
        break;
}
