
<?php
    require "inc/funciones/sesiones.php";

    require "inc/templates/header.php";
?>
    <div class="wrapper">
        <h1>Carrito de Compras</h1>
        <div class="container-carrito">
            <div class="container-lista">
                <?php
                    try {
                        require "inc/funciones/conexionbd.php";

                        $id_user = $_SESSION['id_usuario'];
                        
                        /*Consulta para los carritos*/
                        $sql = "SELECT * FROM carritos WHERE id_usuario = $id_user";
                        $respuesta = $conn->query($sql);

                        /*Precio total de los pruductos*/
                        $total = 0;

                    } catch (Exception $e) {
                        echo "Error: ".$e->getMessage();
                    }
                ?>

                <?php while($carrito = $respuesta->fetch_assoc()){
                    $total += $carrito["total_carrito"];

                    $producto = json_decode($carrito["producto_carrito"]);
                ?>
                    <div class="item-list">
                        <img src="img/productos/<?php echo $producto->url_img?>" alt="">
                        <div class="item-detalle">
                            <p><?php echo $producto->nombre_producto?></p>
                            <p>$<?php echo $producto->precio_producto?></p>
                            <p><small>Cantidad:</small> <?php echo $producto->cantidad?></p>
                            <a href="#" class="btn-borrar" id_usuario="<?php echo $id_user;?>" id_registro="<?php echo $carrito["id_carrito"]?>">Eliminar</a> 
                        </div>
                    </div>

                <?php } $conn->close();?>

                
            </div>
            <div class="container-resumen">
                <h4>RESUMEN</h4>
                <p id="totalCompra">Total: $<?php echo $total?></p>
                <form action="pagar.php" method="POST">
                    <input type="hidden" name="id_usuario" value="<?php echo $id_user?>">
                    <input type="hidden" id="total_usuario" name="total_usuario" value="<?php echo $total?>">

                    <input type="submit" name="submit" value="Procesar Compra">
                </form>
            </div>
        </div>
    </div>

<?php
    require "inc/templates/footer.php";
?>