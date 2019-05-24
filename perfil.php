<?php
require_once 'utils.php';

function renderizarPerfil(){
    $entorno = Entorno::getInstancia();
    $variables = [
        'usuario' => comprobarUsuario()
    ];
    
    echo $entorno->renderizar('perfil_usuario.html',$variables);    
}