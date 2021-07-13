<?php

require '../includes/funciones.php';

if (!authenticate()) header('Location: /');
incluirTemplate('header');

$resultado = $_GET['resultado'] ?? null;

//Conexion de BD
require '../includes/database.php';
$db = conectarDB();

//Query
$query = "SELECT * FROM propiedades";
//Consulta
$resultadoConsulta = mysqli_query($db, $query);


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){

        //Eliminar Archivo
        $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink("../imagenes/".$propiedad['imagen']);

        // Elimina propiedad
        $query = "DELETE FROM propiedades WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);
        if($resultado) header('Location: /admin?resultado=3');

        
    }
}


?>

<main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>

    <!-- Creacion de la bandera -->
    <?php   if(intval($resultado) === 1):  ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php   elseif(intval($resultado) === 2):  ?>
        <p class="alerta exito">Anuncio Actualizado Correctamente</p>
    <?php   elseif(intval($resultado) === 3):  ?>
        <p class="alerta exito">Anuncio Eliminado Correctamente</p>
    <?php   endif;              ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> 
        <!-- mostrar los resultados -->
        <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
            <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad" class="imagen-tabla"></td>
                <td><?php echo '$'.$propiedad['precio']; ?></td>
                <td>
                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                        <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" 
                    class="boton boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</main>

<?php
    //Cerrar conexion
    mysqli_close($db);

    incluirTemplate('footer');
?>
