<?php  

    //BD
    require 'includes/app.php';
    $db = conectarDB();

    $errores = [];

    // Autenticar
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) $errores[] = "El email es obligatorio";
        if(!$password) $errores[] = "El password es obligatorio";

        if(empty($errores)){
            //Usuario
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);

            if($resultado->num_rows){
                $usuario = mysqli_fetch_assoc($resultado);
                

                //Verificar password
                $auth = password_verify($password, $usuario['PASSWORD']);
                
                if($auth){
                    session_start();

                    $_SESSION['usuario'] = $usuario['email'];
                    // $_SESSION['password'] = $usuario['PASSWORD'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');                
                }
                else $errores[] = 'Password incorrecto';
            }
            else $errores[] = 'El usuario no existe';
        }
    }



    // header
    
    incluirTemplate("header");
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php
        foreach($errores as $error):
    ?>

    <div class="alerta error">
        <?php
            echo $error;
        ?>
    </div>

    <?php
        endforeach;
    ?>

    <form method="POST" class="formulario">

        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Correo electronico</label>
            <input type="email" placeholder="Tu correo electronico" id="email" name="email" required>

            <label for="password">password</label>
            <input type="password" placeholder="Tu contraseña" id="password" name="password" required>

        </fieldset>

        <input type="submit" value="iniciar sesión" class="boton-verde boton">

    </form>
</main>

<?php  
incluirTemplate("footer");
?>