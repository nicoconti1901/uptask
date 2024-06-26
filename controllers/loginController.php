<?php

namespace Controllers;

use Model\Usuario;
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
        $usuario = new Usuario();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            $usuario->sincronizar($_POST);
            

            $alertas = $usuario->validarNuevaCuenta();
            debuguear($alertas);
        }

        //Render a la vista
        $router->render('auth/crear-cuenta', [
            'titulo' => 'Crea tu cuenta en UpTask',
            'usuario' => $usuario
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

    public static function reestablecer(Router $router)
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablezca su contraseña'
        ]);
    }

    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta creada correctamente'
        ]);
    }
    public static function confirmarCuenta(Router $router)
    {
        $router->render('auth/confirmar', [
            'titulo' => 'Cuenta confirmada'
        ]);
    }
}
