<?php
require_once 'utils.php';

function renderizarPanelControl(){
    $entorno = Entorno::getInstancia();
    $variables = [
        'eventos' => todosEventos(), 
        'etiquetas' => etiquetas(),
        'comentarios' => todosComentarios(),
        'usuarios' => todosUsuarios(),
        'usuario' => comprobarUsuario()
    ];
    
    echo $entorno->renderizar("panel_control.html",$variables);
}