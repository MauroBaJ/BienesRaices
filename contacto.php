<?php  
include 'includes/funciones.php';
incluirTemplate("header");
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <img src="build/img/destacada3.jpg" alt="Imagen del formulario" loading="lazy">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">Correo electronico</label>
                <input type="email" placeholder="Tu correo electronico" id="email">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Vende o compra</label>
                <select id="opciones">
                    <option value="" disabled selected>--Selecciona una opcion--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" id="presupuesto">

            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-phone">Telefono</label>
                    <input type="radio" name="contacto" value="telefono" id="contactar-phone">

                    <label for="contactar-mail">Email</label>
                    <input type="radio" name="contacto" value="email" id="contactar-mail">
                </div>

                <p>Si eligio telefono, elija la fecha y hora</p>
                
                <label for="fecha">Fecha: </label>
                <input type="date" id="fecha">

                <label for="hora">Hora: </label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php  
incluirTemplate("footer");
?>