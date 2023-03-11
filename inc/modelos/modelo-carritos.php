<?php
require "../funciones/conexionbd.php";

if($_POST["tipoAccion"] === "añadir"){
    $id_producto = $_POST["id_producto"];
    $cantidad = $_POST["cantidad"];
    
    $id_usuario = $_POST["id_usuario"];

    try {

        $sql = "SELECT * FROM carritos WHERE id_usuario = $id_usuario";
        $respuesta = $conn->query($sql);

        if($respuesta->num_rows === 0){/*Usurio que primera vez añade productos a su carrito*/

        }
        /**Se añadiran productos por indice {"5" => array("cantidad" => 4)} */

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