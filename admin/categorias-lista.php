<?php
require "inc/funciones/sesiones.php";

require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <h2>Lista de categorias</h2>
            <div class="contenedor-lista" id="contenedor-lista">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        try {
                            require "inc/funciones/conexionbd.php";
                            $sql = "SELECT * FROM categorias";
                            $respuesta = $conn->query($sql);

                        } catch (Exception $e) {
                            echo "Error: ".$e->getMessage();
                        }
                    ?>
                    <?php while($categoria=$respuesta->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $categoria["nombre_categoria"]?></td>
                            <td><img src="../img/categorias/<?php echo $categoria["url_img"]?>" alt=""></td>
                            <td>
                                <a class="btn-editar" href="categorias-editar.php?id=<?php echo $categoria["id_categoria"]?>"><i class="fa-solid fa-pen"></i></a>
                                <a href="#" class="btn-borrar" id_registro="<?php echo $categoria["id_categoria"]?>" tipoOpcion="categorias" ><i class="fa-solid fa-trash-can"></i></a>

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