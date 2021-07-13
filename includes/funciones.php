<?php

define('TEMPLATES_URL', __DIR__.'/templates');
define('FUNCIONES_URL', __DIR__.'funciones.php');

function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL."/${nombre}.php";
}

function authenticate(){
    session_start();

    if(!$_SESSION['login']){
        header('Location : /');
    }
}

function debug($param){
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
    exit;
}