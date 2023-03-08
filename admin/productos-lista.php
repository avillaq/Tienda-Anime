<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <h2>Lista de productos</h2>
            <div class="contenedor-lista" id="contenedor-lista">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        try {
                            require "inc/funciones/conexionbd.php";
                            $sql = "SELECT productos.id_producto,productos.nombre_producto,productos.precio_producto,productos.url_img,categorias.nombre_categoria FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.id_categoria";
                            $respuesta = $conn->query($sql);

                        } catch (Exception $e) {
                            echo "Error: ".$e->getMessage();
                        }
                    ?>
                    <?php while($producto=$respuesta->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $producto["nombre_producto"]?></td><!--  style="word-break:break-all;  - esto en nombre de producto"-->        
                            <td><?php echo $producto["precio_producto"]?></td>
                            <td><?php echo $producto["nombre_categoria"]?></td>

                            <td><img src="../img/productos/<?php echo $producto["url_img"]?>" alt=""></td>
                            <td>
                                <a class="btn-editar" href="productos-editar.php?id=<?php echo $producto["id_producto"]?>"><i class="fa-solid fa-pen"></i></a>
                                <a href="#" class="btn-borrar" id_registro="<?php echo $producto["id_producto"]?>" tipoOpcion="productos" ><i class="fa-solid fa-trash-can"></i></a>

                            </td>
                        </tr>
                    <?php }
                        $conn->close();
                    ?>
  
                    </tbody>
                    
                </table>

            </div>

        </div>
    </div>


 <?php
require "inc/templates/footer.php";
?>