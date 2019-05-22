<?php 
require_once 'vendor/autoload.php';
require_once 'modelo/polaroids.php';
require_once 'modelo/usuarios.php';
require_once 'utils.php';

function mostrarPrincipal(){
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig   = new \Twig\Environment($loader,[
        'debug' => 'true'
    ]);

    $twig->addExtension(new \Twig\Extension\DebugExtension());
    $template = $twig->load('principal.html');
    
    echo $template->render(['polaroids' => polaroids('all'), 'usuario' => usuario()]);
}