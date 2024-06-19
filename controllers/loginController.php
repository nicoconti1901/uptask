<?php

namespace Controllers;

use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        //Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function logout()
    {
        echo 'Desdeeeeeeeee LoginController';
    }

    public static function crearCuenta(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        //Render a la vista
        $router->render('auth/crear-cuenta', [
            'titulo' => 'Crea tu cuenta en UpTask'
        ]);
    }

    public static function olvidePassword(Router $router)
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
        $router->render('auth/olvide-password', [
            'titulo' => 'Reestablezca su contraseña'
        ]);
    }

    public static function reestablecer()
    {
        echo 'Desde reestablecer password';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
    }

    public static function mensaje()
    {
        echo 'Desdeeeeeeeee LoginController';
    }
    public static function confirmarCuenta()
    {
        echo 'Desdeeeeeeeee LoginController';
    }
}
