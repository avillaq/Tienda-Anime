<?php
    require "inc/templates/header.php";
?>

    <div class="wrapper">
        <div class="contenedor-form">

            <h2>User Login</h2>

            <div class="contenedor-login-register">
                <form id="formulario-usuario">
                    
                    <label for="input-nombre">Usuario: </label>
                    <input type="text" name="nombre_usuario" id="input-nombre" class="form-field" placeholder="Nombre de usuario" required>

                    <label for="input-password">Contraseña: </label>
                    <input type="password" name="pass_usuario" id="input-password" class="form-field" placeholder="Contraseña" required>

                    <input type="hidden" name="tipoAccion" value="login">

                    <div class="container-input-submit">
                        <input type="submit" value="Iniciar sesion">
                    </div>

                    <a href="register.php">Registarse</a>
                    
                </form>
            </div>


        </div>
    </div>

<?php
    require "inc/templates/footer.php";
?>