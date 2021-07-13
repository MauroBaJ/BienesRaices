<?php


require __DIR__."/../vendor/autoload.php";

use App\Propiedad;

require 'funciones.php';
require 'database.php';


$db = conectarDB();
Propiedad::setDB($db);