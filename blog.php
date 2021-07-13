<?php  
include 'includes/funciones.php';
incluirTemplate("header");
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen entrada 1"> </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el <span>20/10/2021</span> por <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y bajo presupuesto</p>
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
                    <p>Escrito el <span>20/09/2021</span> por <span>Admin</span></p>
                    <p>Maximiza tus espacios y agrega un toque de elegancia con los siguientes consejos</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Imagen entrada 3"> </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Oficina en casa 101</h4>
                    <p>Escrito el <span>20/08/2021</span> por <span>Admin</span></p>
                    <p>Es dificil cohabitar en la vivienda con el trabajo. O lo era, lee el siguiente articulo y descubre como combinar ambos espacios.</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <img loading="lazy" src="build/img/blog4.jpg" alt="Imagen entrada 4"> </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Dormitorios y el Feng Shui</h4>
                    <p>Escrito el <span>20/07/2021</span> por <span>Admin</span></p>
                    <p>La antigua filosofia dicta pautas para mejorar los espacios. Lee los siguientes consejos para descubrir como hacer un dormitorio completamente zen.</p>
                </a>
            </div>
        </article>
    </main>

    <?php  
incluirTemplate("footer");
?>