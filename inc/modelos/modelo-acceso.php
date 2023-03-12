<?php
require "../funciones/conexionbd.php";

if($_POST["tipoAccion"] === "login"){
    $nombre_usuario = $_POST["nombre_usuario"];
    $pass_usuario = $_POST["pass_usuario"];
    
    try {

        $sql = "SELECT id_usuario,nombre_usuario,pass_usuario FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
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
                "respuesta" => "exito",
                "accion" => "login",
                "id" => $usuario["id_usuario"]
            );
            /* Iniciamos sesion*/
            session_start();
            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["nombre_usuario"] = $usuario["nombre_usuario"];


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
else if($_POST['tipoAccion'] === "register"){
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
                "accion" => "register"
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

else if($_POST["tipoAccion"] === "loginOut"){
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