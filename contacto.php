<?php 
require_once 'modelo/polaroids.php';

function renderizarContacto(){
    $entorno = Entorno::getInstancia();
    $variables = [
        "usuario" => usuario()
    ];

    echo $entorno->renderizar("contacto.html",$variables);
}