<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <div class="contenedor-lista-crear" id="contenedor-lista-crear">
                <a href="" class="btn-lista selected">Lista de Categorias</a>
                <a href="" class="btn-añadir">Añadir una categoria</a>
            </div>

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
                                <a class="btn-borrar" href=""><i class="fa-solid fa-trash-can"></i></a>

                            </td>
                        </tr>
                    <?php }
                        $conn->close();
                    ?>
  
                    </tbody>
                    
                </table>

            </div>

            <div class="contenedor-añadir" id="contenedor-añadir">
                <p>Crea una nueva categoria</p>
                <form action="">

                    <label for="nombre_categoria">Nombre: </label>
                    <input type="text" name="nombre_categoria" id="nombre_categoria" class="input-nombre" placeholder="Nombre de la categoria">

                    <label for="imagen_categoria">Imagen: </label>
                    <div class="container-input-file">
                        <input type="file" name="imagen_categoria" id="imagen_categoria" class="input-file">
                    </div>
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