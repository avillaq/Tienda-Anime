<?php
require "../funciones/conexionbd.php";

if($_POST['tipoAccion'] === "añadir"){
    $nombre = $_POST['nombre_categoria'];

    $sql = "INSERT INTO ";

    if($nombre !== ""){
        $respuesta = array(
            "Correcto" => $nombre
        );
    }
    else{
        $respuesta = array(
            "Error" => $nombre
        );
    }
    echo json_encode($respuesta);
}
    
else if($_POST['tipoAccion'] === "editar"){
}

else if($_POST['tipoAccion'] === "borrar"){
}

?>