<?php 
require_once 'vendor/autoload.php';
require_once 'modelo/polaroids.php';
require_once 'modelo/usuarios.php';
require_once 'utils.php';

function renderizarPrincipal(){
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig   = new \Twig\Environment($loader,[
        'debug' => 'true'
    ]);

    $twig->addExtension(new \Twig\Extension\DebugExtension());
    $template = $twig->load('principal.html');
    
    echo $template->render(['polaroids' => polaroids('all'), 'usuario' => usuario()]);
}

function aplicarFiltro($etiqueta){
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig   = new \Twig\Environment($loader,[
        'debug' => 'true'
    ]);

    $twig->addExtension(new \Twig\Extension\DebugExtension());
    $template = $twig->load('principal.html');

    echo $template->renderBlock('content',['polaroids' => polaroids($etiqueta)]);
}