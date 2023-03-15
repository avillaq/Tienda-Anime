<?php
    require "inc/templates/header.php";
?>
    <div class="wrapper">
        <h4>NUESTRAS CATEGORÍAS DE PRODUCTOS EN FUNCIÓN DEL ANIME</h4>

        <?php
        try {
            require "inc/funciones/conexionbd.php";
            $sql = "SELECT * FROM categorias";
            $respuesta = $conn->query($sql);

        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }

        ?>
        <div class="container-categorias">
            <?php while($categoria=$respuesta->fetch_assoc()) { ?>
                <div class="card-categoria">
                    <img src="img/categorias/<?php echo $categoria["url_img"]?>" alt="">
                    <a href="categoria-producto.php?id_categoria=<?php echo $categoria["id_categoria"]?>"><?php echo $categoria["nombre_categoria"]?></a>
                </div>
            <?php }
                $conn->close();
            ?>
        </div>
    </div>

    
<?php
    require "inc/templates/footer.php";
?>