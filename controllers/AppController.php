<?php

namespace Controllers;

use Model\Suscripcion;
use MVC\Router;

class AppController
{

    public static function index(Router $router){

        $router->render('pages/index');
    }

    public static function cursos(Router $router){

        $router->render('pages/cursos');
    }

    public static function nosotros(Router $router){

        $router->render('pages/nosotros');
    }

    public static function contacto(Router $router){

        $router->render('pages/contacto');
    }

    public static function suscripcion(Router $router){

        $alertas = [];
        $suscripcion = new Suscripcion;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = new Suscripcion($_POST);
            
            $alertas = $email->validarEmail();

            if(empty($alertas)){

                $resultado = $email->existeEmail();

                if($resultado->num_rows){
                    $alertas = Suscripcion::setAlerta('error', 'El Email ingresado ya recibe actualizaciones');
                }
                elseif($resultado->num_rows === 0){
                    $suscripcion->email = $email->email;
                    $suscripcion->guardar();
                }

            }

        }
        $alertas = Suscripcion::getAlertas();

        $router->render('pages/suscripcion',[
            'suscripcion' => $suscripcion,
            'alertas' => $alertas
        ]);
    }
}
