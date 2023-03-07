<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">

            <div class="contenedor-editar" id="contenedor-editar">
                <p>Edita categorias</p>
                <form id="formulario-archivos" enctype="multipart/form-data">
                    <label for="nombre_categoria">Nombre: </label>
                    <input type="text" name="nombre_categoria" id="nombre_categoria" class="input-nombre" placeholder="Nombre de la categoria">
                    
                    <label for="input-file">Imagen: </label>
                    <div class="container-input-file">
                        <input type="file" name="imagen_categoria" id="input-file" class="input-file" accept="image/png, image/gif, image/jpg, image/webp">
                    </div>

                    <input type="hidden" name="tipoAccion" value="editar">
                    <input type="hidden" name="tipoOpcion" value="categorias">

                    <div class="container-input-submit">
                        <input type="submit" value="Actualizar">
                    </div>
                </form>
            </div>

        </div>
    </div>


 <?php
require "inc/templates/footer.php";
?>