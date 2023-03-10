<?php
    require "inc/templates/header.php";
?>
    <div class="wrapper">
        
            <div class="container-productos">
                <h2>TODOS NUESTROS PRODUCTOS</h2>
                <a href="categorias.php" class="btn-verCategorias">Ver todas las categorias</a>
            </div>
            <div class="productos">

            <?php
                try {
                    require "inc/funciones/conexionbd.php";
                    $sql = "SELECT productos.*, categorias.nombre_categoria FROM productos ";
                    $sql .= "INNER JOIN categorias ON productos.categoria_id = categorias.id_categoria";

                    $respuesta = $conn->query($sql);

                } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                }

            ?>

                <?php while($producto = $respuesta->fetch_assoc()){?>
                <div class="card">
                    <img src="img/productos/<?php echo $producto["url_img"]?>" alt="">
                    <div class="descripcion">
                        <p><small><?php echo $producto["nombre_categoria"]?></small></p>
                        <a href="detalles.php?id_producto=<?php echo $producto["id_producto"]?>" class="nombre-producto"><?php echo $producto["nombre_producto"]?></a>
                        <p><small>$<?php echo $producto["precio_producto"]?></small></p>
                    </div>
                </div>
                <?php }
                    $conn->close();?>
                
            </div>
            </div>

<?php
    require "inc/templates/footer.php";
?>