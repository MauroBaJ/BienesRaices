<?php  
include 'includes/app.php';

$db = conectarDB();

$id = $_GET['id'];
$id =filter_var($id, FILTER_VALIDATE_INT);

if(!$id) header('Location: index.php');

$query = "SELECT * FROM propiedades WHERE id = ${id}";

$resultado = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultado);

incluirTemplate("header");
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'];?></h1>

        <picture>
            <img src="/imagenes/<?php echo $propiedad['imagen'];?>" alt="Imagen de la propiedad" loading="lazy">
            <div class="resumen-propiedad">
                <p class="precio"><?php echo '$'.$propiedad['precio'];?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="/build/img/icono_wc.svg" class="icono-img" alt="Icono WC" loading="lazy">
                        <p><?php echo $propiedad['wc'];?></p>
                    </li>
                    <li>
                        <img src="/build/img/icono_estacionamiento.svg" class="icono-img" alt="Icono Estacionamiento" loading="lazy">
                        <p><?php echo $propiedad['estacionamiento'];?></p>
                    </li>
                    <li>
                        <img src="/build/img/icono_dormitorio.svg" class="icono-img" alt="Icono Habitaciones" loading="lazy">
                        <p><?php echo $propiedad['habitaciones'];?></p>
                    </li>
                </ul>
                <p><?php echo $propiedad['descripcion'];?></p>
            </div>
        </picture>
    </main>

    <?php  
incluirTemplate("footer");
mysqli_close($db);
?>