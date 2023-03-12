<?php
require "inc/funciones/sesiones.php";

require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <h2>Lista de Usuarios</h2>
            <div class="contenedor-lista" id="contenedor-lista">
                <table>
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        try {
                            require "inc/funciones/conexionbd.php";
                            $sql = "SELECT * FROM usuarios";
                            $respuesta = $conn->query($sql);

                        } catch (Exception $e) {
                            echo "Error: ".$e->getMessage();
                        }
                    ?>
                    <?php while($usuario=$respuesta->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $usuario["nombre_usuario"]?></td><!--  style="word-break:break-all;  - esto en nombre de usuario"-->        
                            <td><?php echo $usuario["correo_usuario"]?></td>

                            <td>
                                <a class="btn-editar" href="usuarios-editar.php?id=<?php echo $usuario["id_usuario"]?>"><i class="fa-solid fa-pen"></i></a>

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