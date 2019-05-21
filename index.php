<?php 
require 'vendor/autoload.php';
require_once 'modelo/comentarios.php';
require_once 'modelo/eventos.php';
require_once 'modelo/polaroids.php';
require_once 'modelo/iniciar_sesion.php';
require_once 'modelo/usuarios.php';

// Routing
$dir = 'principal';
if (isset($_GET['dir']))
    $dir = $_GET['dir'];

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig   = new \Twig\Environment($loader,[
    'debug' => 'true'
 ]);
 $twig->addExtension(new \Twig\Extension\DebugExtension());

pedirCerrarSesiones();

// obtener datos sobre polaroids (pagina principal)
function polaroids($etiqueta){
    return pedirPolaroids($etiqueta);
}

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

function usuario(){
    return pedirUsuario();
}

function usuarios(){
    return pedirUsuarios();
}



$template = $twig->load('principal.html');
$user = usuario();

switch($dir){
    case 'principal':

        echo $template->render(['polaroids' => polaroids('all'), 'usuario' => $user]);
        break;
    case 'evento':
        if(isset($_GET['evento']))
            $evento = (int)$_GET['evento'];
        else
            http_response_code(404);
        
        if(isset($_GET['imprimir'])){
            $imprimir = $_GET['imprimir'];

            if($imprimir == 'imprimir')
                echo $twig->render('imprimir_evento.html', ['evento' => evento($evento),'imagenes' => imagenes($evento), 'comentarios' => comentarios($evento), 'usuario' => $user]);
            else
                http_response_code(404);
        }
        else
            echo $twig->render('evento.html', ['evento' => evento($evento),'imagenes' => imagenes($evento), 'comentarios' => comentarios($evento), 'galeria' => galeria($evento),'usuario' => $user]);    
        break;
    case 'filtro':
        if(isset($_GET['etiqueta']))
            $etiqueta = $_GET['etiqueta'];
        else
            http_response_code(404);
        
        echo $template->renderBlock('content',['polaroids' => polaroids($etiqueta)]);
        break;
    case 'contacto':
        echo $twig->render('contacto.html', ['usuario' => $user]);    
        break;
    case 'iniciar-sesion':
        echo $twig->render('iniciar_sesion.html');    
    break;
    case 'prueba':
        echo $twig->render('perfil_usuario.html', ['usuario' => $user]);    
    break;
    case 'panel-control':
        echo $twig->render('panel_control.html', ['polaroids' => polaroids('all'), 'comentarios' => todosComentarios(), 'usuario' => $user, 'usuarios' => usuarios()]);    
    break;
    default:
        http_response_code(404);
        break;
}