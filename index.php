<?php
    require "inc/templates/header.php";
?>

    <div style="background-image:url('img/bg-inicio.webp'); background-size: cover; background-position: center 50%;">
        <div class="bg-inicio" >
            <div class="text-bg-inicio">
                <p>FIGURAS, ROPA Y MUCHO MÁS EN TIENDA ANIME</p>
                <p><b>Tienda oficial de Anime en español.</b> Figuras de los personajes principales de los animes del momento, ropa y accesorios, peluches, funkos y mucho más en Tienda Anime.</p>
                <ul>
                    <li><i class="fa-solid fa-check"></i> Productos 100% originales</li>
                    <li><i class="fa-solid fa-check"></i> Nuevos productos cada mes</li>
                    <li><i class="fa-solid fa-check"></i> Servicio de atención al cliente</li>
                </ul>
            </div>
            <div style="width: 200px;height: 200px;"></div>
        </div>
    </div>
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

                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>

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