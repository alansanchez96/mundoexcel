<?php

namespace Model;

class InfoUser extends ActiveRecord {

    protected static $tabla = 'infouser';
    protected static $columnasDB = ['id','nacimiento','biografia','website','facebook','twitter','instagram','linkedin','usuarioId'];

    public $id;
    public $nacimiento;
    public $biografia;
    public $website;
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkedin;
    public $usuarioId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nacimiento = $args['nacimiento'] ?? null;
        $this->biografia = $args['biografia'] ?? '';
        $this->website = $args['website'] ?? '';
        $this->facebook = $args['facebook'] ?? '';
        $this->twitter = $args['twitter'] ?? '';
        $this->instagram = $args['instagram'] ?? '';
        $this->linkedin = $args['linkedin'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
    }

    public function validarNacimiento(){

        $fechaActual = intval(date('Y-m-d'));

        $edad = $fechaActual - intval( $this->nacimiento );

        if(!$edad >= 17 ){
            self::$alertas['error'][] = 'El usuario debe ser mayor de edad';
        }
        elseif(!$this->nacimiento){
            self::$alertas['error'][] = 'La fecha de nacimiento es obligatoria';
        }
        return self::$alertas;
    }
}