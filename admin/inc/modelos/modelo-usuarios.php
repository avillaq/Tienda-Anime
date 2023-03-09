<?php
require "../funciones/conexionbd.php";

if($_POST['tipoAccion'] === "añadir"){

    /* $respuesta = array(
        "post" => $_POST
    );
    die(json_encode($respuesta)); */

    $nombre = $_POST['nombre_usuario'];
    $correo = $_POST['correo_usuario'];
    $pass = $_POST['pass_usuario'];

    $opciones = array(
        "cost"=>12
    );

    $pass_hashed = password_hash($pass, PASSWORD_BCRYPT,$opciones);


    try {
        
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, correo_usuario, pass_usuario) VALUES(?,?,?)"); 
        $stmt->bind_param("sss",$nombre,$correo, $pass_hashed);
        
        $stmt->execute();

        if($stmt->affected_rows>0){
            $respuesta = array(
                "respuesta" => "exito",
                "accion" => "crear"
            );
        }
        else{
            $respuesta = array(
                "respuesta" => "error"
            );
        }
        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        $respuesta = array(
            "respuesta" => $e->getMessage()
        );
    }

    echo json_encode($respuesta);
}
    
else if($_POST['tipoAccion'] === "editar"){

    $nombre = $_POST['nombre_usuario'];
    $correo = $_POST['correo_usuario'];
    $pass = $_POST['pass_usuario'];

    $id_registro = $_POST['id_registro'];

    try {

        if(trim($pass) === ""){

            $stmt = $conn->prepare("UPDATE usuarios SET nombre_usuario=?, correo_usuario=?,editado=NOW() WHERE id_usuario=?"); 
            $stmt->bind_param("ssi",$nombre,$correo,$id_registro);

        }else{
            $opciones = array(
                "cost"=>12
            );
        
            $pass_hashed = password_hash($pass, PASSWORD_BCRYPT,$opciones);

            $stmt = $conn->prepare("UPDATE usuarios SET nombre_usuario=?, correo_usuario=?,pass_usuario=?,editado=NOW() WHERE id_usuario=?"); 
            $stmt->bind_param("sssi",$nombre,$correo, $pass_hashed,$id_registro);
        }

        $stmt->execute();

        if($stmt->affected_rows>0){
            $respuesta = array(
                "respuesta" => "exito",
                "accion" => "editar"
            );
        }
        else{
            $respuesta = array(
                "respuesta" => "error"
            );
        }
        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        $respuesta = array(
            "respuesta" => $e->getMessage()
        );
    }

    echo json_encode($respuesta);
}

else if($_POST['tipoAccion'] === "borrar"){
    $id_registro = $_POST['id_registro'];
    try {
        $stmt = $conn->prepare("DELETE FROM categorias WHERE id_categoria=?");
        $stmt->bind_param("i",$id_registro);
        $stmt->execute();

        if($stmt->affected_rows>0){
            $respuesta = array(
                "respuesta" => "exito"
            );
        }
        else{
            $respuesta = array(
                "respuesta" => "error"
            );
        }
        
        $stmt->close();
        $conn->close();

        
    } catch (Exception $e) {
        $respuesta = array(
            "respuesta" => $e->getMessage()
        );

    }

    echo json_encode($respuesta);
    
}

?>