<?php
require_once 'utils.php';

function mostrarPanelControl(){
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig   = new \Twig\Environment($loader,[
        'debug' => 'true'
    ]);

    $twig->addExtension(new \Twig\Extension\DebugExtension());
    
    echo $twig->render('panel_control.html',['polaroids' => polaroids('all'), 'usuario' => usuario()]);
}