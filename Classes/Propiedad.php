<?php

namespace App;

class Propiedad{

    //BD
    protected static $db;

    //Errores
    protected static $errores = [];

    protected static $columnasDB = 
    ['id', 'titulo', 'descripcion','precio',
     'imagen', 'habitaciones','wc', 
     'estacionamiento', 'vendedorId', 'creado'];

    public $id;
    public $titulo;
    public $descripcion;
    public $precio;
    public $imagen;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $vendedorId;
    public $creado;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
        $this->creado = Date('Y-m-d');
    }
    
    //Conexion db
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){

        $atributos = $this->sanitize();

        $query = "INSERT INTO propiedades(";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join('\', \'', array_values($atributos));
        $query .= " ')";

        
            
        $resultado = self::$db->query($query);

    }

    //Obtener un arreglo que represente a los campos del objeto

    public function atributos() : array{
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    //Sanitizar los valores regresados del atributo

    public function sanitize() : array{
        $atributos = $this->atributos();
        $sanitizado = [];
        

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Obtener los errores

    public static function getErrores() : array{
        return self::$errores;
    }

    //Validar los datos

    public function validate(){
        if(!$this->titulo){
            self::$errores[] = 'Debes añadir un titulo';
        }
        if(!$this->precio){
            self::$errores[] = 'Debes añadir un precio';
        }
        if(!strlen($this->descripcion) > 50){
            self::$errores[] = 'Debes añadir una descripcion de al menos 50 caracteres';
        }
        if(!$this->habitaciones){
            self::$errores[] = 'Debes añadir las habitaciones';
        }
        if(!$this->wc){
            self::$errores[] = 'Debes añadir los wc';
        }
        if(!$this->estacionamiento){
            self::$errores[] = 'Debes añadir los estacionamientos';
        }
        if(!$this->vendedorId){
            self::$errores[] = 'Debes elegir un vendedor';
        }
        
        // //Imagen
        // if(!$this->imagen['name'] || $this->imagen['error']){
        //     self::$errores[] = 'Debes añadir una imagen';
        // }
        // $medida = 1000*200;
        // if($this->imagen['size'] > $medida){
        //     self::$errores = 'La imagen es muy grande, inserte una de menos de 100 Kb';
        // }

        return self::$errores;
    }


}