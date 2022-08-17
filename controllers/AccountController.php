<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario;
use Intervention\Image\ImageManagerStatic as Image;

class AccountController
{

    public static function index(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $id = $_SESSION['id'];
        $usuario = Usuario::find($id);

        $router->render('account/dashboard', [
            'usuario' => $usuario
        ]);
    }

    public static function editar(Router $router)
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        $id = $_SESSION['id'];
        $usuario = Usuario::find($id);

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->editarPerfil_validate();

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            $imgUpload = $_FILES['picture']['tmp_name'];


            if ($imgUpload) {
                $picture = Image::make($imgUpload)->fit(800, 600);
                $usuario->setImagen($nombreImagen);
            }

            if (empty($alertas)) {

                if ($imgUpload) {
                    if (!is_dir(CARPETA_IMAGENES_AUTH)) {
                        mkdir(CARPETA_IMAGENES_AUTH);
                    }
                    $picture->save(CARPETA_IMAGENES_AUTH . $nombreImagen);
                }

                $resultado = $usuario->guardar();

                if ($resultado === true) {
                    header('location: /account/dashboard');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('account/basic-information', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function payments(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $id = $_SESSION['id'];
        $usuario = Usuario::find($id);

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            # code...

        }

        $router->render('account/payments', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function certificados(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $id = $_SESSION['id'];
        $usuario = Usuario::find($id);

        $router->render('account/my-certificates', [
            'usuario' => $usuario
        ]);
    }

    public static function courses(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $id = $_SESSION['id'];
        $usuario = Usuario::find($id);

        $router->render('account/my-courses', [
            'usuario' => $usuario
        ]);
    }

    public static function security(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $id = $_SESSION['id'];
        $usuario = Usuario::find($id);

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Usuario($_POST); // Contiene cuando se realiza el post

            $alertas = $auth->validar('email', 'El email no puede estar vacío');

            if (empty($alertas)) {
                // Si el mail ingresado es igual al mail del usuario
                if ($auth->email === $usuario->email) {

                    // Comprobar que la contraseña ACTUAL sea correcta
                    if (!empty($auth->password_actual)) {
                        // Comparar la contraseña ACTUAL con la contraseña hash del usuario
                        $resultado = password_verify($auth->password_actual, $usuario->password);

                        if ($resultado) {
                            // Verificar que el campo NUEVA contraseña esté completo
                            $alertas = $auth->validar('password', 'Algunos campos están vacíos');

                            if (empty($alertas)) {
                                // Verificar que la NUEVA contraseña no sea igual a la actual
                                if ($auth->password === $auth->password_actual && $usuario->password) {
                                    $alertas = Usuario::setAlerta('error', 'La nueva contraseña no debe ser identica la actual');
                                } else {
                                    // Entonces si es igual, verificar que el campo repetir no esté vacio
                                    $alertas = $auth->validar('password1', 'Algunos campos están vacíos1');

                                    if (empty($alertas)) {
                                        // Verificar que Repetir sea igual a Nuevo
                                        if ($auth->password1 === $auth->password) {

                                            $usuario->password = null;
                                            $usuario->password1 = null;
                                            $usuario->password = $auth->password;
                                            $usuario->password1 = $auth->password1;

                                            $usuario->hashearPassword();
                                            $resultado = $usuario->guardar();

                                            if ($resultado) {
                                                header('location: /account/dashboard');
                                            }
                                        } else {
                                            $alertas = Usuario::setAlerta('error', 'Porfavor repite bien tu contraseña');
                                        }
                                    }
                                }
                            }
                        } else {
                            $alertas = Usuario::setAlerta('error', 'La contraseña actual no es correcta');
                        }
                    } elseif (empty($auth->password_actual)) {
                        # El campo password está vacio, no hacer nada...
                    }
                } else {

                    if($usuario->email_nuevo){
                        if ($usuario->email_nuevo === $auth->email ) {
                            $alertas = Usuario::setAlerta('error','El email que ingresaste ya está en proceso de cambio. Verifica tu correo.');
                        } else{
                            
                            $usuario->email_nuevo = null;
                            $usuario->email_nuevo = $auth->email;
                            
                            $usuario->crearToken();
    
                            $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                            $email->emailChange();
    
                            $resultado = $usuario->guardar();
                            if($resultado){
                                header('location: /account/dashboard');
                            }
                        }
                    } else{
                        $usuario->email_nuevo = null;
                        $usuario->email_nuevo = $auth->email;
                        
                        $usuario->crearToken();

                        $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                        $email->emailChange();

                        $resultado = $usuario->guardar();
                        if($resultado){
                            header('location: /account/dashboard');
                        }
                    }
                    
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('account/security', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function newEmail(Router $router)
    {
        $alertas = [];
        $token = '';

        if ($_GET) {
            $token = s($_GET['token']);
        } else {
            $token = '';
            header('location: /');
        }
        $error = true;
        
        $usuario = Usuario::where('token', $token);

        if (empty($usuario) || $usuario->token === '') {
            Usuario::setAlerta('error', 'Token inválido');

        } elseif( $usuario->token !== $usuario->token){
            Usuario::setAlerta('error', 'Token Invalido');
        } else{
            $error = false;

            $usuario->token = '' ?? null;
            $usuario->email = '' ?? null;
            $usuario->email = $usuario->email_nuevo;
            $usuario->email_nuevo = '' ?? null;

            $resultado = $usuario->guardar();
            if($resultado){
                Usuario::setAlerta('exito', 'El email ha sido cambiado correctamente');
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/recover/nuevoemail', [
            'alertas' => $alertas,
            'error' => $error
        ]);
    }
}
