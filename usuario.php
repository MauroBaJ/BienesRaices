<?php

require 'includes/database.php';

$db = conectarDB();

//Crear email y password
$email = 'correo@correo.com';
$password = '123456';

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//Query
$query = "INSERT INTO usuarios (email, password) VALUES  ('${email}', '${passwordHash}')";


mysqli_query($db, $query);