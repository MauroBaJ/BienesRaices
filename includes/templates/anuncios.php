<?php

//Conexion BD

$db = conectarDB();

//Consultar

$query = "SELECT * FROM propiedades LIMIT ${limite}";
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">

        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">
            <picture>
                <img src="/imagenes/<?php echo $propiedad['imagen'];?>" alt="Anuncio casa <?php echo $propiedad['id'];?>" loading="lazy">
            </picture>
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo'];?></h3>
                <p><?php echo $propiedad['descripcion'];?></p>
                <p class="precio"><?php echo '$'.$propiedad['precio'];?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="/build/img/icono_wc.svg" class='icono-img' alt="Icono WC" loading="lazy">
                        <p><?php echo $propiedad['wc'];?></p>
                    </li>
                    <li>
                        <img src="/build/img/icono_estacionamiento.svg" class='icono-img' alt="Icono Estacionamiento"
                            loading="lazy">
                        <p><?php echo $propiedad['estacionamiento'];?></p>
                    </li>
                    <li>
                        <img src="/build/img/icono_dormitorio.svg" class='icono-img' alt="Icono Habitaciones"
                            loading="lazy">
                        <p><?php echo $propiedad['habitaciones'];?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton boton-amarillo-block">Ver propiedad</a>
            </div> <!-- contenido del anuncio -->
        </div> <!-- Anuncio -->
        <?php endwhile; ?>
    </div><!-- Contenedor General de anuncios -->

<?php
    //Cerrar conexion

?>