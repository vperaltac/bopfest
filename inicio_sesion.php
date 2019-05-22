<?php 
require_once 'vendor/autoload.php';

function mostrarInicioSesion(){
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig   = new \Twig\Environment($loader,[
        'debug' => 'true'
    ]);

    $twig->addExtension(new \Twig\Extension\DebugExtension());

    echo $twig->render('iniciar_sesion.html');
}