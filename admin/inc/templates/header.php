<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                <img class="logo-img" src="../img/logo.png" alt="Logo">
                <a href="index.php" class="logo-title">TIENDA ANIME - <small>Administracion</small></a>
            </div>
            <a href="#" class="btn-out"><i class="fa-solid fa-right-to-bracket"></i> Cerrar Sesion</a>
        </div>

        
    </header>
    <main>
        <div class="navegacion">
            <h2><i class="fa fa-user"></i> Admin</h2>
            <div id="nav-menu">
                <?php
                $path = $_SERVER["PHP_SELF"];
                $file_name = basename($path, ".php");
                ?>
                <a class="btn-menu <?php echo ($file_name === "index")? "active" : "";?>" href="index.php">Dashboard</a>
                <a class="btn-menu <?php echo ($file_name === "usuarios" || $file_name === "usuarios-editar")? "active" : "";?>" href="usuarios.php">Usuarios</a>
                <a class="btn-menu <?php echo ($file_name === "productos" || $file_name === "productos-editar")? "active" : "";?>" href="productos.php">Productos</a>
                <a class="btn-menu <?php echo ($file_name === "categorias" || $file_name === "categorias-editar")? "active" : "";?>" href="categorias.php">Categorias</a>
            </div>
        </div>
