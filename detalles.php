<?php
    require "inc/templates/header.php";
?>
    <div class="container-detalles">
        <div class="detalles">

        <?php
                try {
                    require "inc/funciones/conexionbd.php";

                    $id_producto = $_GET["id_producto"];

                    /*Consulta para los productos*/
                    $sql = "SELECT nombre_producto, precio_producto, url_img FROM productos WHERE id_producto = $id_producto";
                    $respuesta = $conn->query($sql);

                    $producto = $respuesta->fetch_assoc();

                } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                }

            ?>


            <img src="img/productos/<?php echo $producto["url_img"]?>" alt="">

            <div class="detalles-producto">
                <p><?php echo $producto["nombre_producto"]?></p>
                <small>Envio Gratis</small>
                <p>$<?php echo $producto["precio_producto"]?></p>
 
                <form id="formulario-carrito" class="formulario-carrito">
                    <input type="number" name="cantidad" min=1 value=1>

                    <input type="submit" class="btn-submit" value="Añadir al carrito">
                </form>
                    
                <div class="info-detalles">
                    <div class="garantia">
                        <span class="span-icon"><i class="fa-solid fa-shield-halved"></i></span>
                        <div>
                            <p>Garantía de 90 días</p>
                            <p><span>Garantía de reembolso</span></p>
                        </div>
                    </div>
                    <div class="devoluciones">
                        <span class="span-icon"><i class="fa-solid fa-retweet"></i></span>
                        <div>
                            <p>Devoluciones gratis</p>
                            <p><span>En un plazo de 15 días</span></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
    

<?php
    require "inc/templates/servicios.php";
    require "inc/templates/footer.php";
?>