<?php

function conectarDB() : mysqli{
    //Elimine mi password de la BD
    $db = new mysqli('localhost', 'admin', '', 'bienesraices');
    $db->set_charset('utf8');

    if(!$db){
        echo 'Error, no se pudo conectar';
        exit;
    }

    return $db;
}