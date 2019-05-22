<?php 
require_once 'vendor/autoload.php';
require_once 'modelo/polaroids.php';

function renderizarContacto(){
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig   = new \Twig\Environment($loader,[
        'debug' => 'true'
    ]);

    $twig->addExtension(new \Twig\Extension\DebugExtension());
    
    echo $twig->render('contacto.html', ['usuario' => usuario()]);    
}