<?php
    require "inc/templates/header.php";
?>

    <div class="wrapper">
        <div class="contenedor-form">

            <h2>User Register</h2>

            <div class="contenedor-login-register">
                <form id="formulario-usuario">
                    
                    <label for="input-nombre">Usuario: </label>
                    <input type="text" name="nombre_usuario" id="input-nombre" class="form-field" placeholder="Nombre de usuario" required>

                    <label for="input-correo">Correo: </label>
                    <input type="email" name="correo_usuario" id="input-correo" class="form-field" placeholder="Correo del usuario" required>

                    <label for="input-password">Contraseña: </label>
                    <input type="password" name="pass_usuario" id="input-password" class="form-field" placeholder="Contraseña" required>

                    <label for="input-confirm-password">Confirma la contraseña: </label>
                    <input type="password" id="input-confirm-password" class="form-field" placeholder="Confirma la contraseña" required>

                    <input type="hidden" name="tipoAccion" value="añadir">

                    <div class="container-input-submit">
                        <input type="submit" value="Registarse">
                    </div>
                    
                </form>
            </div>


        </div>


    </div>

<?php
    require "inc/templates/footer.php";
?>