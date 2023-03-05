<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">
            <div class="contenedor-lista-crear">
                <a href="">Lista de Categorias</a>
                <a href="">Crear nueva Categoria</a>
            </div>

            <div class="contenedor-lista">
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
                                <a class="btn btn-editar" href="editar.php?id="><i class="fas fa-pen-square"></i></a>
                                <button data-id="" type="button" class="btn btn-borrar"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>Figura de accion</td>
                            <td><img src="../img/categorias/spy.webp" alt=""></td>
                            <td>
                                <a class="btn btn-editar" href="editar.php?id=">
                                <i class="fas fa-pen-square"></i> 
                                </a>
                                <button data-id="" type="button" class="btn btn-borrar">
                                <i class="fas fa-trash-alt"></i> 
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Figura de accion</td>
                            <td><img src="../img/categorias/spy.webp" alt=""></td>
                            <td>
                                <a class="btn btn-editar" href="editar.php?id=">
                                <i class="fas fa-pen-square"></i> 
                                </a>
                                <button data-id="" type="button" class="btn btn-borrar">
                                <i class="fas fa-trash-alt"></i> 
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    
                </table>

            </div>

            <!-- <div class="contenedor-crear">
                HOlS
            </div> -->
        </div>
    </div>


 <?php
require "inc/templates/footer.php";
?>