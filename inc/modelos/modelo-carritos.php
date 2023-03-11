<?php
require "../funciones/conexionbd.php";

if($_POST["tipoAccion"] === "añadir"){
    $id_producto = $_POST["id_producto"];
    $cantidad = $_POST["cantidad"];
    
    $id_usuario = $_POST["id_usuario"];

    try {
        
        $sql = "SELECT nombre_producto, precio_producto,url_img FROM productos WHERE id_producto = $id_producto";
        $respuesta_producto = $conn->query($sql);
        $producto = $respuesta_producto->fetch_assoc();
        
        array_push_assoc($producto, array('cantidad'=>$cantidad)); /** Mi propia funcion*/

        $producto_carrito = json_encode($producto);
        $total_carrito = $producto["precio_producto"]*$cantidad;

        $stmt = $conn->prepare("INSERT INTO carritos (producto_carrito, total_carrito, id_usuario) VALUES(?,?,?)"); 
        $stmt->bind_param("sdi",$producto_carrito , $total_carrito ,$id_usuario);

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


function array_push_assoc(array &$arrayDatos, array $values){
    $arrayDatos = array_merge($arrayDatos, $values);
}


?>