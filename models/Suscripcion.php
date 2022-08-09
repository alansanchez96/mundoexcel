<?php

namespace Model;

class Suscripcion extends ActiveRecord {

    protected static $tabla = 'suscripcion';
    protected static $columnasDB = ['id', 'email'];

    public $id;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
    }

    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][] = 'Porfavor ingresa un email correcto';
        }
        return self::$alertas;
    }
    public function existeEmail(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        return $resultado;
    }
}