<?php
require "../funciones/conexionbd.php";

if($_POST['tipoAccion'] === "añadir"){
    $nombre = $_POST['nombre_categoria'];

    /*$respuesta = array(
        "post" => $_POST,
        "file" => $_FILES //Para archivos
    );
    die(json_encode($respuesta));*/
    
    $directorio = "../../img/categorias/";
    if(!is_dir($directorio)){
        mkdir($directorio, 0755,true);//Crea una carpeta
    }


    if(move_uploaded_file($_FILES["imagen_categoria"]["tmp_name"], $directorio.$_FILES["imagen_categoria"]["name"])){
        $imagen_url = $_FILES["imagen_categoria"]["name"];
        $imagen_resultado = "Se subio correctamente";

        $respuesta = array(
            "respuesta" => "Se subio correctamente"
        );
    }
    else{
        $respuesta = array(
            "respuesta" => error_get_last()
        );
    }

    /* try {

        $stmt = $conn->prepare("INSERT INTO categorias  (nombre_categoria, url_imagen) VALUES(?,?)"); 
        $stmt->bind_param("ss",$nombre,$imagen_url);
        $stmt->execute();

        if($stmt->affected_rows>0){
            $respuesta = array(
                "respuesta" => "exito",
                "id_insertado" => $stmt->insert_id,
                "resultado_imagen" => $imagen_resultado
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

    } */

    echo json_encode($respuesta);

}
    
else if($_POST['tipoAccion'] === "editar"){
}

else if($_POST['tipoAccion'] === "borrar"){
}

?>