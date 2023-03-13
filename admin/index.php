<?php
require "inc/funciones/sesiones.php";

require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <h2>Dashboard de administracion</h2>

            <?php

                try {
                    require "inc/funciones/conexionbd.php";

                    /**Usuarios */
                    $sql = "SELECT COUNT(id_usuario) as registros, SUM(total_usuario) as ganancia FROM usuarios";
                    $respuesta = $conn->query($sql);
                    $usuario = $respuesta->fetch_assoc();

                     /**Carritos */
                     $sql = "SELECT COUNT(DISTINCT id_usuario) as registros FROM carritos";
                     $respuesta = $conn->query($sql);
                     $carrito = $respuesta->fetch_assoc();
                     
                    /**Productos */
                    $sql = "SELECT COUNT(id_producto) as registros FROM productos";
                    $respuesta = $conn->query($sql);
                    $producto = $respuesta->fetch_assoc();

                     /**Categorias */
                     $sql = "SELECT COUNT(id_categoria) as registros FROM categorias";
                     $respuesta = $conn->query($sql);
                     $categoria = $respuesta->fetch_assoc();


                    $conn->close();

                } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                }

            ?>

            <div class="contenedor-dashboard">

                <div class="card-info card-blue">
                        <div class="text-info">
                            <p class="cantidad"><?php echo $usuario["ganancia"]?></p>
                            <p>Ganancias totales</p>
                        </div>
                        <i class="fa-solid fa-dollar-sign"></i>
                </div>

                <div class="card-info card-red">
                        <div class="text-info">
                            <p class="cantidad"><?php echo $carrito["registros"]?></p>
                            <p>Carritos sin pagar</p>
                        </div>
                        <i class="fa-solid fa-piggy-bank"></i>
                </div>

                <div class="card-info card-green">
                        <div class="text-info">
                            <p class="cantidad"><?php echo $usuario["registros"]?></p>
                            <p>Total usuarios</p>
                        </div>
                        <i class="fa-solid fa-users"></i>
                </div>

                <div class="card-info card-yellow">
                        <div class="text-info">
                            <p class="cantidad"><?php echo $producto["registros"]?></p>
                            <p>Total productos</p>
                        </div>
                        <i class="fa-solid fa-dragon"></i>
                </div>

                <div class="card-info card-blue">
                        <div class="text-info">
                            <p class="cantidad"><?php echo $categoria["registros"]?></p>
                            <p>Total categorias</p>
                        </div>
                        <i class="fa-solid fa-list-ul"></i>
                </div>

            </div>
        </div>
    </div>


 <?php
require "inc/templates/footer.php";
?>