<?php
// muestra todos los errores generados por PHP en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "database.php";

// registra un usuario en la base de datos
function pedirUsuarios(){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id_usuario,nombre,email,tipo FROM usuarios;");
    $usuarios = array();
    $i=0;
    while($fila = $peticion->fetch_assoc()){
        $usuarios[$i] = $fila;
        $i++;
    }

    return $usuarios;
}

// registra un usuario en la base de datos
function registrarUsuario($correo,$nombre,$hash){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id_usuario FROM usuarios WHERE email='$correo';");

    if($peticion->num_rows === 0){
        $correo = $mysqli->real_escape_string($correo);
        $tipo = "registrado";

        $sentencia = $mysqli->prepare("INSERT INTO usuarios (email,nombre,passwd,tipo) VALUES (?,?,?,?);");
        $sentencia->bind_param("ssss",$correo,$nombre,$hash,$tipo);
        $sentencia->execute();

        echo "Correcto";
    }
    else{
        echo "Error: el usuario indicado ya existe";
    }
}

function iniciarSesion($correo,$passwd){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT id_usuario,nombre,email,tipo,passwd FROM usuarios WHERE email='$correo';");

    if($peticion->num_rows === 0){
        echo "Usuario no existe";
    }
    else if($peticion->num_rows === 1){
        $row = $peticion->fetch_assoc();
        $id  = $row['id_usuario'];

        if(password_verify($passwd,$row['passwd'])){
            echo "Login correcto";
            return $row;
        }
        else
            echo "Contraseña incorrecta";
    }
    else
        echo "Existen múltiples usuarios con el mismo correo";

    return false;
}

function editarNombre($id_usuario,$nuevo_nombre){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $sentencia = $mysqli->prepare("UPDATE usuarios SET nombre=? WHERE id_usuario=?;");
    $sentencia->bind_param("si",$nuevo_nombre,$id_usuario);
    $sentencia->execute();
}

function editarEmail($id_usuario,$email){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $sentencia = $mysqli->prepare("UPDATE usuarios SET email=? WHERE id_usuario=?;");
    $sentencia->bind_param("si",$email,$id_usuario);
    $sentencia->execute();
}

function editarPasswd($id_usuario,$hash){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $sentencia = $mysqli->prepare("UPDATE usuarios SET passwd=? WHERE id_usuario=?;");
    $sentencia->bind_param("si",$hash,$id_usuario);
    $sentencia->execute();
}

function editarRol($id_usuario,$rol){
    $db = Database::getInstancia();
    $mysqli = $db->getConexion();

    $peticion = $mysqli->query("SELECT tipo FROM usuarios WHERE id_usuario='$id_usuario';");
    $row = $peticion->fetch_assoc();
    $antiguo_rol  = $row['tipo'];

    if($antiguo_rol != 'superusuario'){
        if($rol == 'superusuario'){
            $buscar_superusuario = $mysqli->query("UPDATE usuarios SET tipo='registrado' WHERE tipo='superusuario';");
        }
    
        $sentencia = $mysqli->prepare("UPDATE usuarios SET tipo=? WHERE id_usuario=?;");
        $sentencia->bind_param("si",$rol,$id_usuario);
        $sentencia->execute();

        echo "Rol cambiado.";
    }
    else{
        echo "Error. No debe quedar la plataforma nunca sin al menos un superusuario.";
    }


}