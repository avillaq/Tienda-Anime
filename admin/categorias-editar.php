<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <h2>Editar categoria</h2>
            <div class="contenedor-editar" id="contenedor-editar">
                <?php
                $id_registro = $_GET["id"];

                try {
                    require "inc/funciones/conexionbd.php";
                    $sql = "SELECT * FROM categorias WHERE id_categoria = $id_registro";
                    $respuesta = $conn->query($sql);

                    $categoria = $respuesta->fetch_assoc();

                    $conn->close();

                } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                }

                ?>
                <form id="formulario-admin" enctype="multipart/form-data">
                    <label for="input-nombre">Nombre: </label>
                    <input type="text" name="nombre_categoria" id="input-nombre" class="form-field" placeholder="Nombre de la categoria" value="<?php echo $categoria["nombre_categoria"]?>" required>
            
                    <label>Imagen Actual: </label>
                    <img src="../img/categorias/<?php echo $categoria["url_img"]?>" alt="Imagen actual" class="imagen-actual">
                    
                    <label for="input-file">Imagen: </label>
                    <div class="container-input-file">
                        <input type="file" name="imagen_categoria" id="input-file" class="input-file" accept="image/png, image/gif, image/jpg, image/webp">
                    </div>

                    <input type="hidden" name="tipoAccion" value="editar">
                    <input type="hidden" name="tipoOpcion" value="categorias">

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