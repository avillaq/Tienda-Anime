<?php
require "../funciones/conexionbd.php";

if($_POST['tipoAccion'] === "loginOut"){


    session_start();

    // restablece todas las variables de sesión a sus valores predeterminados
    $_SESSION = array();

    // destruye la sesión actual
    session_destroy();

    $respuesta = array(
        "respuesta" => "exito"
    );
    
    echo json_encode($respuesta);
}

?>