<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <h2>Editar producto</h2>
            <div class="contenedor-editar" id="contenedor-editar">
                <?php
                $id_registro = $_GET["id"];

                try {
                    require "inc/funciones/conexionbd.php";
                    $sql = "SELECT * FROM productos WHERE id_producto = $id_registro";
                    $respuesta = $conn->query($sql);

                    $producto = $respuesta->fetch_assoc();

                    $conn->close();

                } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                }

                ?>
                <form id="formulario-archivos" enctype="multipart/form-data">
                    <label for="input-nombre">Nombre: </label>
                    <input type="text" name="nombre_producto" id="input-nombre" class="input-nombre" placeholder="Nombre del producto" value="<?php echo $producto["nombre_producto"]?>" required>

                    <label for="input-precio">Precio: </label>
                    <input type="number" name="precio_producto" id="input-precio" class="input-precio" placeholder="1.0" step="0.01" min="0" value="<?php echo $producto["precio_producto"]?>" required>


                    <?php
                        try {
                            require "inc/funciones/conexionbd.php";
                            $sql = "SELECT id_categoria,nombre_categoria FROM categorias";
                            $respuesta = $conn->query($sql);

                        } catch (Exception $e) {
                            echo "Error: ".$e->getMessage();
                        }
                    ?>
                    <label for="select-categoria">Categoria: </label>
                    <select name="categoria_producto" id="select-categoria" form="formulario-archivos" required>
                        <option value="0" disabled>-- Selecciona una categoria --</option>
                        <?php while($categoria=$respuesta->fetch_assoc()){?>
                            <?php
                                if($producto["categoria_id"] === $categoria["id_categoria"]){?>
                                    <option value="<?php echo $categoria["id_categoria"]?>" selected><?php echo $categoria["nombre_categoria"]?></option>
                            <?php }?>
                            <option value="<?php echo $categoria["id_categoria"]?>"><?php echo $categoria["nombre_categoria"]?></option>
                        <?php }
                            $conn->close();
                        ?>

                    </select>
            
                    <label>Imagen Actual: </label>
                    <img src="../img/productos/<?php echo $producto["url_img"]?>" alt="Imagen actual" class="imagen-actual">
                    
                    <label for="input-file">Imagen: </label>
                    <div class="container-input-file">
                        <input type="file" name="imagen_producto" id="input-file" class="input-file" accept="image/png, image/gif, image/jpg,image/jpeg, image/webp">
                    </div>

                    <input type="hidden" name="tipoAccion" value="editar">
                    <input type="hidden" name="tipoOpcion" value="productos">

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