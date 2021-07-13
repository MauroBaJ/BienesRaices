<?php
    if(!isset($_SESSION)) session_start();

    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php  if($inicio) echo 'inicio'; else echo ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de bienes raices">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono responsive">
                </div>
                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="Dark mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/nosotros.php">nosotros</a>
                        <a href="/anuncios.php">anuncios</a>
                        <a href="/blog.php">blog</a>
                        <a href="/contacto.php">contacto</a>
                        <?php if($auth): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <?php
                if($inicio) echo "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>";
            ?>

        </div>
    </header>