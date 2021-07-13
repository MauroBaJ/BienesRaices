<?php  
include 'includes/app.php';
incluirTemplate("header");
?>

    <section class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>
    </section>

    <div class="contenido-nosotros">
        <div class="imagen">
            <img src="/build/img/nosotros.jpg" alt="Acerca de nosotros">
        </div>
        <div class="texto-nosotros">
            <blockquote>25 años de experiencia</blockquote>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis quam
                alias totam omnis. Vitae sunt, labore, aspernatur eius delectus atque
                eos magni quasi eligendi repellendus eum libero distinctio, modi nostrum.</p>
            <p>Quia beatae dicta nesciunt voluptates qui, maxime hic facilis voluptatem?
                Nulla dolor repellat omnis illo temporibus enim veritatis aspernatur voluptates,
                quibusdam nisi. Nobis hic dignissimos nulla reiciendis magnam? Consectetur, quo.</p>
        </div>
    </div>

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

    <?php  
incluirTemplate("footer");
?>