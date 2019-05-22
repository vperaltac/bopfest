<?php 
require_once 'modelo/usuarios.php';

function usuario(){
    return pedirUsuario();
}

function polaroids($etiqueta){
    return pedirPolaroids($etiqueta);
}