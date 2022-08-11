<?php

namespace Model;

class Usuario extends ActiveRecord {

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellido','email','telefono','dni','password','password1','admin','confirmado','token','picture','biografia','website','facebook','twitter','linkedin','password_actual'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $dni;
    public $password;
    public $password1;
    public $admin;
    public $confirmado;
    public $token;
    public $picture;
    public $biografia;
    public $website;
    public $facebook;
    public $twitter;
    public $linkedin;
    public $password_actual;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password1 = $args['password1'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
        $this->picture = $args['picture'] ?? 'perfildefault.png';
        $this->biografia = $args['biografia'] ?? '';
        $this->website = $args['website'] ?? '';
        $this->facebook = $args['facebook'] ?? '';
        $this->twitter = $args['twitter'] ?? '';
        $this->linkedin = $args['linkedin'] ?? '';
        $this->password_actual = $args['password_actual'] ?? '';
    }

    public function editarPerfil_validate(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El campo Nombre está vacío';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El campo Apellido está vacío';
        }
        if(!$this->dni){
            self::$alertas['error'][] = 'El campo DNI está vacío';
        }

        return self::$alertas;
    }

    public function validarCuenta(){
        if(empty($this->nombre)){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(empty($this->apellido)){
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if(!$this->dni){
            self::$alertas['error'][] = 'El DNI es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El correo es obligatorio';
        }
        if(!$this->telefono){
            self::$alertas['error'][] = 'El teléfono es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        if(!$this->password1){
            self::$alertas['error'][] = 'Falta confirmar la contraseña';
        } elseif($this->password != $this->password1){
            self::$alertas['error'][] = 'Las contraseñas no coinciden';
        }

        return self::$alertas;
    }
    public function comprobar($tipo, $mensajetipo){
        if(!$this->$tipo){
            self::$alertas['error'][] = $mensajetipo;
        }
        return self::$alertas;
    }
    public function comprobarLogin(){
        if(!$this->email){
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        return self::$alertas;
    }

    /*  */

    public function existeEmail(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        return $resultado;
    }
    public function existeDni(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE dni = '" . $this->dni . "' LIMIT 1";
        $resultado = self::$db->query($query);

        return $resultado;
    }
    public function hashearPassword()    {
        $this->password = password_hash($this->password , PASSWORD_BCRYPT);
        $this->password1 = password_hash($this->password1 , PASSWORD_BCRYPT);
    }
    public function crearToken()    {
        $this->token = uniqid();
    }
    public function comprobarPassword($password) {
        $resultado = password_verify($password, $this->password);
        
        if(!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }

}