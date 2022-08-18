<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class AuthController {

    public static function login(Router $router){

        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->comprobarLogin();

            if(empty($alertas)){
                // Comprobar que el usuario existe
                $usuario = Usuario::where('email', $auth->email);

                if($usuario){
                    // Si el usuario existe, comprobar si la contraseña es correcta
                    if($usuario->comprobarPassword($auth->password)){
                        // Darle inicio de sesion
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . ' ' . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['telefono'] = $usuario->telefono;
                        $_SESSION['dni'] = $usuario->dni;
                        $_SESSION['login'] = true;

                        if($usuario->admin === '1'){
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('location: /account/dashboard');
                        }else{
                            header('location: /');
                        }
                    }

                }
                else{
                    $alertas = Usuario::getAlertas('error', 'El usuario no está registrado');
                }
            }

        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/login',[
            'alertas' => $alertas
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function register(Router $router){

        $usuario = new Usuario;
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarCuenta();

            if(empty($alertas)){
                $resultadoEmail = $usuario->existeEmail();
                $resultadoDni = $usuario->existeDni();

                if($resultadoEmail->num_rows){
                    $alertas = Usuario::getAlertas();
                    $alertas['error'][] = 'El email ya está registrado';
                }
                elseif($resultadoDni->num_rows){
                    $alertas = Usuario::getAlertas();
                    $alertas['error'][] = 'El DNI ya está registrado';
                }
                elseif($resultadoEmail->num_rows === 0 and $resultadoEmail->num_rows === 0){
                    $usuario->hashearPassword();
                    $usuario->crearToken();

                    copy($_SERVER['DOCUMENT_ROOT'] . '/build/img/perfildefault.png', $_SERVER['DOCUMENT_ROOT'] . '/build/img/imagenes_usuarios/perfildefault.png');

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    $resultado = $usuario->guardar();

                    if($resultado){
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/register',[
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }

    public static function message(Router $router){

        $router->render('auth/mensaje');
    }
    
    public static function confirm(Router $router){
            $alertas = [];

            $token = '';
            
            if($_GET){
                $token = s($_GET['token']);
            }
            else{
                $token = '';
                header('location: /');
            }

            $usuario = Usuario::where( 'token' , $token );

            if(empty($usuario) || $usuario->token === ''){
                $alertas = Usuario::setAlerta('error', 'Token inválido');
            }
            else{
                $usuario->confirmado = '1';
                $usuario->token = '';
                $usuario->guardar();
                
                $alertas = Usuario::setAlerta('exito', 'Cuenta confirmada con éxito');
            }

            $alertas = Usuario::getAlertas();

            $router->render('auth/confirmacion',[
                'alertas' => $alertas,
            ]);
    }

    public static function recoverEmail(Router $router){
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $auth = new Usuario($_POST);
            $alertas = $auth->comprobar('email', 'El email es obligatorio');
            
            if(empty($alertas)){
                $usuario = $auth->where('email', $auth->email);

                if($usuario && $usuario->confirmado === '1'){

                    $usuario->crearToken();
                    $usuario->guardar();

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->emailRecover();

                    $alertas = Usuario::setAlerta('exito', 'El email fue enviado exitosamente');

                }
                else{
                    $alertas = Usuario::setAlerta('error', 'El email no está registrado o no confirmado');
                }
            }
            
            
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/recover/email',[
            'alertas' => $alertas
        ]);
    }
    public static function recoverDni(Router $router){
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $auth = new Usuario($_POST);
            $alertas = $auth->comprobar('dni','El DNI es obligatorio');
            
            if(empty($alertas)){
                $usuario = $auth->where('dni', $auth->dni);

                if($usuario && $usuario->confirmado === '1'){

                    $usuario->crearToken();
                    $usuario->guardar();

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->emailRecover();
                    $alertas = Usuario::setAlerta('exito', 'Tu email es: ' . $usuario->email);
                    $alertas = Usuario::setAlerta('exito', 'El email fue enviado exitosamente');

                }
                else{
                    $alertas = Usuario::setAlerta('error', 'El DNI no está registrado o no confirmado');
                }
            }
            
            
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/recover/dni',[
            'alertas' => $alertas
        ]);
    }

    public static function restore(Router $router){

        $alertas = [];
        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if(empty($usuario) || $usuario->token === ''){
            Usuario::setAlerta('error', 'Token inválido');
            $error = 'hidden';
        }
        else{
            // Crear nueva contraseña
            $error = '';
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $password = new Usuario($_POST);
                // Comprobar que el campo no esté vacio
                $alertas = $password->comprobar('password','La contraseña es obligatoria');
                
                if( empty($alertas) ){
                    // Borrar su contraseña
                    $usuario->password = null;
                    $usuario->password = $password->password;

                    $usuario->hashearPassword();
                    $usuario->token = null;
                    $resultado = $usuario->guardar();
                    if($resultado){
                        header('location: /login');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/recover/restore', [
            'alertas' => $alertas,
            'error' => $error
        ]);
    }
}