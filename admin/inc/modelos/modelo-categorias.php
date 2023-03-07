<?php
require "../funciones/conexionbd.php";

if($_POST['tipoAccion'] === "añadir"){
    $nombre = $_POST['nombre_categoria'];

    /* $respuesta = array(
        "post" => $_POST,
        "file" => $_FILES["imagen_categoria"]["error"] //Para archivos
    );
    die(json_encode($respuesta)); */
    
    $directorio = "../../../img/categorias/";
    if(!is_dir($directorio)){
        mkdir($directorio, 0755,true);//Crea una carpeta
    }

    if(move_uploaded_file($_FILES["imagen_categoria"]["tmp_name"], $directorio.$_FILES["imagen_categoria"]["name"])){
        $imagen_url = $_FILES["imagen_categoria"]["name"];
    }
    else{
        $respuesta = array(
            "respuesta" => error_get_last()
        );
    }

    try {
        $stmt = $conn->prepare("INSERT INTO categorias (nombre_categoria, url_img) VALUES(?,?)"); 
        $stmt->bind_param("ss",$nombre,$imagen_url);
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

    $nombre = $_POST['nombre_categoria'];
    $id_registro = $_POST['id_registro'];

    try {

        if($_FILES["imagen_categoria"]["error"] === 4){//error 4 : no se subio ningun archivo

            //Sin imagen (imagen no cambia)
            $stmt = $conn->prepare("UPDATE categorias SET nombre_categoria= ?, editado=NOW() WHERE id_categoria=?");

            $stmt->bind_param("si",$nombre,$id_registro);

        }else{
            $directorio = "../../../img/categorias/";
            if(!is_dir($directorio)){
                mkdir($directorio, 0755,true);//Crea una carpeta
            }

            if(move_uploaded_file($_FILES["imagen_categoria"]["tmp_name"], $directorio.$_FILES["imagen_categoria"]["name"])){
                $imagen_url = $_FILES["imagen_categoria"]["name"];
            }
            else{
                $respuesta = array(
                    "respuesta" => error_get_last()
                );
            }

            //Con imagen (imagen cambia)
            $stmt = $conn->prepare("UPDATE categorias SET nombre_categoria= ?, url_img=?, editado=NOW() WHERE id_categoria=?");

            $stmt->bind_param("ssi",$nombre,$imagen_url, $id_registro);
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