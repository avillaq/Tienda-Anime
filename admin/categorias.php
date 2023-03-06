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

            </div>

            <div class="contenedor-añadir" id="contenedor-añadir">
                <p>Crea una nueva categoria</p>
                <form action="">
                    
                    <input type="text" name="nombre_categoria" id="nombre_categoria" class="input-nombre" placeholder="Nombre de la categoria">
                    
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