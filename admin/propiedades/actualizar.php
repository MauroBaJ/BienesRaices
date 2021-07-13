<?php

require '../../includes/database.php';
require '../../includes/funciones.php';

if (!authenticate()) header('Location: /');

//ID Valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id) header('Location : /admin');

incluirTemplate('header');

//Conexion a DB
$db = conectarDB();

//obtener datos de propiedad
$query = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultado);

//Seleccionar vendedores
$query = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $query);

//Arreglo de errores
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$imagenPropiedad = $propiedad['imagen'];

//Ejecutar codigo despues de enviar form
if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    // echo '<pre>';
    // var_dump($_FILES);
    // echo '</pre>';

    // exit;
    
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']) ;
    $precio = mysqli_real_escape_string($db, $_POST['precio']) ;
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']) ;
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']) ;
    $wc = mysqli_real_escape_string($db, $_POST['wc']) ;
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']) ;
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedorId']) ;
    $creado = mysqli_real_escape_string($db, date('Y-m-d'));

    $imagen = $_FILES['imagen'];

    // var_dump($imagen['name']);
    // exit;

    if(!$titulo){
        $errores[] = 'Debes añadir un titulo';
    }
    if(!$precio){
        $errores[] = 'Debes añadir un precio';
    }
    if(!strlen($descripcion) > 50){
        $errores[] = 'Debes añadir una descripcion de al menos 50 caracteres';
    }
    if(!$habitaciones){
        $errores[] = 'Debes añadir las habitaciones';
    }
    if(!$wc){
        $errores[] = 'Debes añadir los wc';
    }
    if(!$estacionamiento){
        $errores[] = 'Debes añadir los estacionamientos';
    }
    if(!$vendedorId){
        $errores[] = 'Debes elegir un vendedor';
    }

    //Validar tamaño de imagen
    $medida = 1000*200;
    if($imagen['size'] > $medida){
        $errores = 'La imagen es muy grande, inserte una de menos de 100 Kb';
    }


    //Revisar que no haya errores
    if(empty($errores)){



         //Carpeta de imagenes
         $carpeta = '../../imagenes/';

        if(!is_dir($carpeta)) mkdir($carpeta);

        $nombreIMG = '';
        
        //Eliminar Imagen previa
        if($imagen['name']){
            unlink($carpeta.$propiedad['imagen']);
            //Generar nombre unico
            $nombreIMG = md5(uniqid(rand(), true)).".jpg";
            //Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpeta.$nombreIMG);
        } else $nombreIMG = $propiedad['imagen'];



        $query = "UPDATE propiedades SET titulo = '${titulo}', precio = ${precio}, imagen ='${nombreIMG}',  descripcion = '${descripcion}',
        habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorID = ${vendedorId} WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);
        if($resultado){
            header('Location: /admin?resultado=2');
        }
        else var_dump($resultado);
    }

}
?>

<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error ?>
    </div>
    
    <?php endforeach; ?>
        

    <form class="formulario" method="POST" enctype="multipart/form-data">
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
            <img src="/imagenes/<?php echo $imagenPropiedad;?>" class="imagen-small">

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

         <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
