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
                    header('location: /account/basic-information');
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

            # code...

        }

        $router->render('account/security', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}
