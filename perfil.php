<?php
require_once 'utils.php';

function renderizarPerfil(){
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig   = new \Twig\Environment($loader,[
        'debug' => 'true'
    ]);

    $twig->addExtension(new \Twig\Extension\DebugExtension());
    
    echo $twig->render('perfil_usuario.html', ['usuario' => usuario()]);    
}