<?php

require(__DIR__.'/../../includes/templates/header.php');
require '../../includes/app.php';

use App\Propiedad;



authenticate();

$db = conectarDB();

//Seleccionar vendedores
$query = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $query);

//Arreglo de errores
$errores = Propiedad::getErrores();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';

//Ejecutar codigo despues de enviar form
if($_SERVER['REQUEST_METHOD'] === 'POST' ){

    $propiedad = new Propiedad($_POST);

    $errores = $propiedad->validate();
    
    

    //Revisar que no haya errores
    if(empty($errores)){

        
        $propiedad->guardar();

        $imagen = $_FILES['imagen'];

        //Carpeta de imagenes
        $carpeta = '../../imagenes/';

        if(!is_dir($carpeta)) mkdir($carpeta);
        
        //Generar nombre unico
        $nombreIMG = md5(uniqid(rand(), true)).".jpg";
        //Subir imagen
        move_uploaded_file($imagen['tmp_name'], $carpeta.$nombreIMG);

        $resultado = mysqli_query($db, $query);
        if($resultado){
            header('Location: /admin?resultado=1');
        }
        else var_dump($resultado);
    }

    //Insertar en BD

}
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error ?>
    </div>
    
    <?php endforeach; ?>
        

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General de la propiedad</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" 
            placeholder="Titulo de la propiedad" value="<?php echo $titulo;?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio"
             placeholder="Precio de la propiedad" value="<?php echo $precio;?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" 
            accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion;?></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones"
            placeholder="Ejemplo: 3" min="1" max='9' value="<?php echo$habitaciones;?>">
        
            <label for="wc">Baños</label>
            <input type="number" id="wc" name="wc" placeholder="Ejemplo: 3" 
            min="1" max='9' value="<?php echo $wc;?>">

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" id="estacionamiento" name="estacionamiento" 
            placeholder="Ejemplo: 3" min="1" max='9' value="<?php echo $estacionamiento;?>">
        
        </fieldset>
         
         <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedorId">
                <option value="">--Seleccione un vendedor--</option>
                <?php while($row = mysqli_fetch_assoc($resultado)):?>
                    <option <?php echo $vendedorId == $row["id"]? 'selected' : '';?> value="<?php echo $row["id"];?>"><?php echo $row["nombre"]." ".$row["apellido"]; ?></option>
                <?php endwhile;?>
            </select>
         </fieldset>

         <input type="submit" value="Crear propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
