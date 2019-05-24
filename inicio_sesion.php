<?php 
require_once "entorno.php";
require_once "utils.php";


function renderizarInicioSesion(){
    $entorno = Entorno::getInstancia();

    $variables = [
        "polaroids" => polaroids("all"),
        "usuario"   => comprobarUsuario()
    ];

    echo $entorno->renderizar('iniciar_sesion.html',$variables);
}