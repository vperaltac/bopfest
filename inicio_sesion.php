<?php 
require_once 'vendor/autoload.php';

function renderizarInicioSesion(){
    $entorno = Entorno::getInstancia();

    $variables = [
        "polaroids" => polaroids("all"),
        "usuario"   => usuario()
    ];

    echo $entorno->renderizar('iniciar_sesion.html',$variables);
}