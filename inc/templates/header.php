<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="ico" href="img/logo.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Open+Sans:wght@400;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/main.css">        

    <title>Tienda Anime</title>
</head>
<body>
    <header>
        <div class="side-header">
            <div class="logo">
                <img class="logo-img" src="img/logo.png" alt="Logo">
                <a href="index.php" class="logo-title">TIENDA ANIME</a>
            </div>
            <div class="nav">
                <a href="index.php">Inicio</a>
                <a href="categorias.php">Categorias</a>
            </div>
            <div class="user-menu">
                
                <?php
                    $path = $_SERVER["PHP_SELF"];
                    $archivo = basename($path, ".php");

                    ($archivo==="carrito" || $archivo==="pago-finalizado") ? "": session_start(); /* Caso especial Carrrito, pago-finalizado */
                ?>  
                <?php if(isset($_SESSION["id_usuario"])){?>              
                    <a><i class="fa-regular fa-user"></i> <?php echo $_SESSION["nombre_usuario"]?></a>
                    <a href="carrito.php"><i class="fa-solid fa-cart-shopping"></i> Carrito</a>
                    <a href="#" id="btnCerrarSesion"><i class="fa-solid fa-right-to-bracket"></i> Cerrar Sesion</a>
                <?php }else{?>
                    <a href="login.php"><i class="fa-regular fa-user"></i> Iniciar Sesion</a>
                <?php }?>

            </div>
        </div>
        
    </header>
    <main>