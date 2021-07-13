<?php  
include 'includes/app.php';
incluirTemplate("header");
?>
<main class="contenedor seccion">
    <h1>Casas y departamento en ventas</h1>
        <?php 
            $limite = 10;
            include 'includes/templates/anuncios.php';
    ?>
</main>
<?php  
incluirTemplate("footer");
mysqli_close($db);
?>