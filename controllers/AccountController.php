<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;
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

            $auth = new Usuario($_POST);// Contiene cuando se realiza el post

            $alertas = $auth->validar('email', 'El email no puede estar vacío');

            if(empty($alertas)){
                // Si el mail ingresado es igual al mail del usuario
                if($auth->email === $usuario->email){

                    // Comprobar que la contraseña ACTUAL sea correcta
                    if(isset($auth->password_actual)){
                        // Comparar la contraseña ACTUAL con la contraseña hash del usuario
                        $resultado = password_verify($auth->password_actual, $usuario->password);
                        
                        if($resultado){
                            // Verificar que el campo NUEVA contraseña esté completo
                            $alertas = $auth->validar('password', 'La nueva contraseña no puede estar vacía');

                            if(empty($alertas)){
                                // Verificar que la NUEVA contraseña no sea igual a la actual
                                if($auth->password === $auth->password_actual && $usuario->password){
                                    $alertas = Usuario::setAlerta('error','La nueva contraseña no debe ser identica la actual');
                                } else{
                                    // Si no es igual a la ACTUAL entonces
                                    echo "Todo ok";
                                }
                            }
                        } else{
                            $alertas = Usuario::setAlerta('error', 'La contraseña actual no es correcta');
                        }
                    }
                    else{
                        # El campo password está vacio, no hacer nada...
                        
                    }

                }
                else{
                    # Enviar email de nuevo email
                    echo "Mail cambiado pronto";
                    debuguear($auth);
                }


            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('account/security', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}
