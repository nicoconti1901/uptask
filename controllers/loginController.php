<?php

namespace Controllers;

use Clases\Email;
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
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            if (empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);
                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El email ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear password
                    $usuario->hashPassword();

                    //Eliminar password2
                    unset($usuario->password2);

                    //Generar token
                    $usuario->generarToken();

                    //Crear usuario
                    $resultado = $usuario->guardar();

                    //Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if ($resultado) {

                        header('Location: /mensaje');
                    }
                }
            }
        }


        //Render a la vista
        $router->render('auth/crear-cuenta', [
            'titulo' => 'Crea tu cuenta en UpTask',
            'usuario' => $usuario,
            'alertas' => $alertas
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
        $token = $_GET['token'];
        if (!$token) {
            header('Location: /');
        }
        //Encontrar al usuario
        $usuario = Usuario::where('token', $token);

        
        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no valido');
        }else{
            $usuario->confirmado = 1;
            $usuario->token = null;
            unset($usuario->password2);

            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta confirmada correctamente');
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/confirmar', [
            'titulo' => 'Cuenta confirmada',
            'alertas' => $alertas
        ]);
    }
}
