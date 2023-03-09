<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <h2>Editar usuario</h2>
            <div class="contenedor-editar" id="contenedor-editar">
                <?php
                $id_registro = $_GET["id"];

                try {
                    require "inc/funciones/conexionbd.php";
                    $sql = "SELECT nombre_usuario,correo_usuario FROM usuarios WHERE id_usuario = $id_registro";
                    $respuesta = $conn->query($sql);

                   $usuario = $respuesta->fetch_assoc();

                    $conn->close();

                } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                }

                ?>
                <form id="formulario-admin">

                    <label for="input-nombre">Usuario: </label>
                    <input type="text" name="nombre_usuario" id="input-nombre" class="form-field" placeholder="Nombre de usuario" value="<?php echo $usuario["nombre_usuario"]?>" required>

                    <label for="input-correo">Correo: </label>
                    <input type="email" name="correo_usuario" id="input-correo" class="form-field" placeholder="Correo del usuario" value="<?php echo $usuario["correo_usuario"]?>" required>

                    <label for="input-password">Contraseña: </label>
                    <input type="password" name="pass_usuario" id="input-password" class="form-field" placeholder="Contraseña">

                    <label for="input-confirm-password">Confirma la contraseña: </label>
                    <input type="password" id="input-confirm-password" class="form-field" placeholder="Confirma la contraseña">


                    <input type="hidden" name="tipoAccion" value="editar">
                    <input type="hidden" name="tipoOpcion" value="usuarios">

                    <input type="hidden" name="id_registro" value="<?php echo $id_registro;?>">

                    <div class="container-input-submit">
                        <input type="submit" value="Actualizar">
                    </div>
                </form>
            </div>

        </div>
    </div>


 <?php
require "inc/templates/footer.php";
?>