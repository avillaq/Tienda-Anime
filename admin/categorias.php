<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <div class="contenedor-lista-crear">
                <a href="">Lista de Categorias</a>
                <a href="">Crear nueva Categoria</a>
            </div>

            <!-- <div class="contenedor-lista">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Figura de accion</td>
                            <td><img src="../img/categorias/spy.webp" alt=""></td>
                            <td>
                                <a class="btn-editar" href="editar.php?id="><i class="fa-solid fa-pen"></i></a>
                                <a class="btn-borrar" href=""><i class="fa-solid fa-trash-can"></i></a>

                            </td>
                        </tr>

                        <tr>
                            <td>Figura de accion</td>
                            <td><img src="../img/categorias/spy.webp" alt=""></td>
                            <td>
                                <a class="btn-editar" href="editar.php?id="><i class="fa-solid fa-pen"></i></a>
                                <a class="btn-borrar" href=""><i class="fa-solid fa-trash-can"></i></a>

                            </td>
                        </tr>

                        <tr>
                            <td>Figura de accion</td>
                            <td><img src="../img/categorias/spy.webp" alt=""></td>
                            <td>
                                <a class="btn-editar" href="editar.php?id="><i class="fa-solid fa-pen"></i></a>
                                <a class="btn-borrar" href=""><i class="fa-solid fa-trash-can"></i></a>

                            </td>
                        </tr>

                        
                    </tbody>
                    
                </table>

            </div> -->

            <div class="contenedor-crear">
                <form action="">
                    <label for="nombre_categoria">Nombre: </label>
                    <input type="text" name="nombre_categoria" id="nombre_categoria">
                    
                    <label for="imagen_categoria">Imagen: </label>
                    <input type="file" name="imagen_categoria" id="imagen_categoria">

                    <input type="submit" value="Crear">
                </form>
            </div>
        </div>
    </div>


 <?php
require "inc/templates/footer.php";
?>