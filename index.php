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
function polaroids($etiqueta){
    return pedirPolaroids($etiqueta);
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

function palabras(){
    return pedirPalabrasProhibidas();
}

function enviarComentario($datos){
    $valores = json_decode($datos);
    addComentario($valores->id_evento,$valores->ip_usuario,$valores->nombre,$valores->correo,$valores->mensaje);
}

$template = $twig->load('principal.html');


switch($dir){
    case 'principal':
        echo $template->render(['polaroids' => polaroids('all')]);
        break;
    case 'evento':
        if(isset($_GET['evento']))
            $evento = (int)$_GET['evento'];
        else
            http_response_code(404);
        
        if(isset($_GET['imprimir'])){
            $imprimir = $_GET['imprimir'];

            if($imprimir == 'imprimir')
                echo $twig->render('imprimir_evento.html', ['evento' => evento($evento),'imagenes' => imagenes($evento), 'comentarios' => comentarios($evento)]);
            else
                http_response_code(404);

        }
        else{
            echo $twig->render('evento.html', ['evento' => evento($evento),'imagenes' => imagenes($evento), 'comentarios' => comentarios($evento)]);    
        }
        break;
    case 'filtro':
        if(isset($_GET['etiqueta']))
            $etiqueta = $_GET['etiqueta'];
        else
            http_response_code(404);
        
        echo $template->renderBlock('content',['polaroids' => polaroids($etiqueta)]);
        break;
    case 'contacto':
        echo $twig->render('contacto.html');    
        break;
    case 'palabras':
        echo palabras();
        break;
    case 'addComentario':
        $datos = file_get_contents('php://input');
        enviarComentario($datos);
        break;
    default:
        http_response_code(404);
        break;
}