<?php 
require_once 'modelo/iniciar_sesion.php';

function usuario(){
    return pedirUsuario();
}

function polaroids($etiqueta){
    return pedirPolaroids($etiqueta);
}