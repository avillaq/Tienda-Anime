<?php
require "../funciones/conexionbd.php";

if($_POST["tipoAccion"] === "login"){
    $nombre_usuario = $_POST["nombre_usuario"];
    $pass_usuario = $_POST["pass_usuario"];
    
    try {

        $sql = "SELECT nombre_usuario,pass_usuario FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
        $resultado = $conn->query($sql);

        if($resultado->num_rows === 0){/**El usuario no existe */
            $respuesta = array(
                "respuesta" => "error"
            );
            die(json_encode($respuesta));
        }
        $usuario = $resultado->fetch_assoc();

        $pass_hashed = $usuario["pass_usuario"];

        if(password_verify($pass_usuario, $pass_hashed)) {
            $respuesta = array(
                "respuesta" => "exito"
            );
        }else{
            $respuesta = array(
                "respuesta" => "error"
            );
        }

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
    $id_usuario = $_POST['id_usuario'];

    try {
        $stmt = $conn->prepare("DELETE FROM carritos WHERE id_carrito=?");
        $stmt->bind_param("i",$id_registro);
        $stmt->execute();

        if($stmt->affected_rows>0){

            $sql = "SELECT SUM(total_carrito) as total FROM carritos WHERE id_usuario = $id_usuario";
            $resultado = $conn->query($sql);

            $nuevo_total = $resultado->fetch_assoc();

            $respuesta = array(
                "respuesta" => "exito",
                "nuevoTotal" => $nuevo_total["total"]
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