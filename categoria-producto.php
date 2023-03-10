<?php
    require "inc/templates/header.php";
?>

            <?php
                try {
                    require "inc/funciones/conexionbd.php";

                    $id_categoria = $_GET["id"];

                    /*Consulta para los productos*/
                    $sql = "SELECT * FROM productos WHERE categoria_id = $id_categoria ";
                    $respuesta = $conn->query($sql);

                    /*Consulta para el nombre de la categoria*/
                    $stmt = "SELECT nombre_categoria FROM categorias WHERE id_categoria = $id_categoria";
                    $respuesta_categoria = $conn->query($stmt);
                    $nombre_categoria = $respuesta_categoria->fetch_assoc();

                } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                }

            ?>

    <div style="background-image:url('img/categorias/bg.png');">
        <div class="bg-categoria-producto" style="">
            <div class="title-categoria-producto">
                <p>Categoria</p>
                <h1><?php echo $nombre_categoria["nombre_categoria"]?></h1>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="productos">

            
            <?php if($respuesta->num_rows>0){?>

                <?php while($producto=$respuesta->fetch_assoc()){?>

                    <div class="card">
                        <img src="img/productos/<?php echo $producto["url_img"]?>" alt="">
                        <div class="descripcion">
                            <p><small><?php echo $nombre_categoria["nombre_categoria"]?></small></p>
                            <a href="detalles.php" class="nombre-producto"><?php echo $producto["nombre_producto"]?></a>
                            <p><small>$<?php echo $producto["precio_producto"]?></small></p>
                        </div>
                    </div>

                <?php }?>

            <?php }else{?>

                <img src="img/categorias/sin-productos.png" alt="" class="img-sin-productos">
                <div class="text-sin-productos">
                    <p>Esta categoria aun no tiene productos!!</p>
                </div>
                
            <?php } $conn->close();?>

        </div>
    </div>
    

<?php
    require "inc/templates/footer.php";
?>