<?php
require_once 'utils.php';

function renderizarPerfil(){
    $entorno = Entorno::getInstancia();
    $variables = [
        'usuario' => usuario()
    ];
    
    echo $entorno->renderizar('perfil_usuario.html',$variables);    
}