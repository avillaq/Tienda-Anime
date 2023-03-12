<?php
require "inc/funciones/sesiones.php";

require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">

            <h2>Crea un nuevo producto</h2>

            <div class="contenedor-añadir" id="contenedor-añadir">
                <form id="formulario-admin" enctype="multipart/form-data">
                    
                    <label for="input-nombre">Nombre: </label>
                    <input type="text" name="nombre_producto" id="input-nombre" class="form-field" placeholder="Nombre del producto" required>

                    <label for="input-precio">Precio: </label>
                    <input type="number" name="precio_producto" id="input-precio" class="form-field" placeholder="1.0" step="0.01" min="0" required>

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
                    <select class="form-field" name="categoria_producto" id="select-categoria" form="formulario-admin" required>
                        <option value="0" selected disabled>---- Selecciona una categoria ----</option>
                        <?php while($categoria=$respuesta->fetch_assoc()){?>
                            <option value="<?php echo $categoria["id_categoria"]?>"><?php echo $categoria["nombre_categoria"]?></option>
                        <?php }
                            $conn->close();
                        ?>

                    </select>
                    
                    <label for="input-file">Imagen: </label>
                    <div class="container-input-file">
                        <input type="file" name="imagen_producto" id="input-file" class="input-file" accept="image/png, image/gif, image/jpg, image/jpeg, image/webp">
                    </div>
                 
                    <input type="hidden" name="tipoAccion" value="añadir">
                    <input type="hidden" name="tipoOpcion" value="productos">

                    <div class="container-input-submit">
                        <input type="submit" value="Añadir">
                    </div>
                    
                </form>
            </div>


        </div>
    </div>


 <?php
require "inc/templates/footer.php";
?>