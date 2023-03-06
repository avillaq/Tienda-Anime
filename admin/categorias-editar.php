<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">

            <div class="contenedor-editar" id="contenedor-editar">
                <p>Edita categorias</p>
                <form action="">
                    
                    <input type="text" name="nombre_categoria" id="nombre_categoria" class="input-nombre" placeholder="Nombre de la categoria">
                    
                    <div class="container-input-file">
                        <input type="file" name="imagen_categoria" id="imagen_categoria" class="input-file">
                    </div>
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