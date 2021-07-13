<?php  
    require 'includes/app.php';
$inicio = true;
incluirTemplate("header", $inicio);
?>


<main class="contenedor seccion">
    <h2>Más sobre nosotros</h2>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="/build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestiae voluptas beatae quibusdam neque aliquam qui nam
                ipsam ad tenetur, explicabo at eos, voluptate repellendus!</p>
        </div>
        <div class="icono">
            <img src="/build/img/icono2.svg" alt="Icono seguridad" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestiae voluptas beatae quibusdam neque aliquam qui nam
                ipsam ad tenetur, explicabo at eos, voluptate repellendus!</p>
        </div>
        <div class="icono">
            <img src="/build/img/icono3.svg" alt="Icono seguridad" loading="lazy">
            <h3>A tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestiae voluptas beatae quibusdam neque aliquam qui nam
                ipsam ad tenetur, explicabo at eos, voluptate repellendus!</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y departamento en ventas</h2>

    <?php
        
        $limite = 3;
        include 'includes/templates/anuncios.php';
        
    ?>

    <div class="ver-todas alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver todas</a>
    </div>

</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
    <a href="contacto.php" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen entrada 1"> </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="meta">Escrito el <span>20/10/2021</span> por <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y bajo
                        presupuesto</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen entrada 1"> </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p class="meta">Escrito el <span>20/09/2021</span> por <span>Admin</span></p>
                    <p>Maximiza tus espacios y agrega un toque de elegancia con los siguientes consejos</p>
                </a>
            </div>
        </article>
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal es muy amable y tiene muy buena atencion. Comprare mi siguiente propiedad con ellos.
            </blockquote>
            <p>Mauricio Basurto</p>
        </div>
    </section>
</div>

<?php incluirTemplate('footer'); ?>