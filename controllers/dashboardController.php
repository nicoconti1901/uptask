<?php
namespace Controllers;

use MVC\Router;

class dashboardController{
    public static function index(Router $router){
        session_start();
        isAuth();
        $router->render('dashboard/index',[
            'titulo' => 'Proyectos'
        ]);
    }

    public static function crearProyecto(Router $router){
        session_start();
        isAuth();
        $router->render('dashboard/crear-proyecto',[
            'titulo' => 'Crear Proyecto'
        ]);
    }

    public static function perfil(Router $router){
        session_start();
        isAuth();
        $router->render('dashboard/perfil',[
            'titulo' => 'Perfil'
        ]);
    }
}

