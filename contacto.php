<?php 
require_once 'utils.php';

function renderizarContacto(){
    $entorno = Entorno::getInstancia();
    $variables = [
        "usuario" => usuario()
    ];

    echo $entorno->renderizar("contacto.html",$variables);
}