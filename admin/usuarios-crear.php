<?php
require "inc/templates/header.php";
?>
    <div class="container">
        <div class="contenedor-option">

            <h2>Crea un nuevo usuario</h2>

            <div class="contenedor-añadir" id="contenedor-añadir">
                <form id="formulario-admin">
                    
                    <label for="input-nombre">Usuario: </label>
                    <input type="text" name="nombre_usuario" id="input-nombre" class="form-field" placeholder="Nombre de usuario" required>

                    <label for="input-correo">Correo: </label>
                    <input type="email" name="correo_usuario" id="input-correo" class="form-field" placeholder="Correo del usuario" required>

                    <label for="input-password">Contraseña: </label>
                    <input type="password" name="pass_usuario" id="input-password" class="form-field" placeholder="Contraseña" required>

                    <label for="input-confirm-password">Confirma la contraseña: </label>
                    <input type="password" id="input-confirm-password" class="form-field" placeholder="Confirma la contraseña" required>

                    <input type="hidden" name="tipoAccion" value="añadir">
                    <input type="hidden" name="tipoOpcion" value="usuarios">

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