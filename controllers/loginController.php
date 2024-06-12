<?php

namespace Controllers;

class LoginController
{
    public static function login()
    {
        echo 'Desdeeeeeeeee LoginController';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
    }

    public static function logout()
    {
        echo 'Desdeeeeeeeee LoginController';
    }

    public static function crearCuenta()
    {
        echo 'Desde Crear Cuenta';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
    }

    public static function olvidePassword()
    {
        echo 'Desde olvide password';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
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
