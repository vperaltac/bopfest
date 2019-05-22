<?php 
require_once 'principal.php';
require_once 'eventos.php';
require_once 'contacto.php';
require_once 'inicio_sesion.php';
require_once 'panel_control.php';
require_once 'perfil.php';


// Recibe la URI de htacces en formato "limpio"
$uri = $_SERVER['REQUEST_URI'];

// Separar URI utilizando como delimitador "/" y guardar cada string en un array
$array_uri = explode("/",$uri);
//print_r($array_uri);

// llamar a cada archivo dependiendo del formato de la URI
switch($array_uri[1]){
    case "principal":
        if(array_key_exists(2,$array_uri) && $array_uri[2] == "filtro"){
            if(array_key_exists(3,$array_uri)){
                aplicarFiltro($array_uri[3]);
            }
            else
                http_response_code(404);
        }
        else
            renderizarPrincipal();
        break;
    case "evento":
        if(array_key_exists(2,$array_uri)){
            if(array_key_exists(3,$array_uri) && $array_uri[3] == "imprimir")
                renderizarEvento((int)$array_uri[2],TRUE);
            else
                renderizarEvento((int)$array_uri[2],FALSE);
        }
        else
            http_response_code(404);
        break;
    case "contacto":
        renderizarContacto();
        break;
    case "iniciar-sesion":
        renderizarInicioSesion();
        break;
    case "panel-control":
        renderizarPanelControl();
        break;
    case "perfil":
        renderizarPerfil();
        break;
}

// TODO: modificar llamada para aplicar filtros
/* case 'filtro':
if(isset($_GET['etiqueta']))
    $etiqueta = $_GET['etiqueta'];
else
    http_response_code(404);

echo $template->renderBlock('content',['polaroids' => polaroids($etiqueta)]);
break;
 */