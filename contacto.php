<?php 
require_once 'utils.php';

function renderizarContacto(){
    $entorno = Entorno::getInstancia();
    $variables = [
        "usuario" => comprobarUsuario()
    ];

    echo $entorno->renderizar("contacto.html",$variables);
}