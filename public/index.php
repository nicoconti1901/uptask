<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\dashboardController;
use MVC\Router;
$router = new Router();

//Login
$router->get('/', [LoginController::class,'login']);
$router->post('/', [LoginController::class,'login']);
$router->get('/logout', [LoginController::class,'logout']);


//Crear cuenta
$router->get('/crear-cuenta', [LoginController::class,'crearCuenta']);
$router->post('/crear-cuenta', [LoginController::class,'crearCuenta']);

//Formulario de olvido de contraseña
$router->get('/olvide-password', [LoginController::class,'olvidePassword']);
$router->post('/olvide-password', [LoginController::class,'olvidePassword']);


//Nuevo password
$router->get('/reestablecer', [LoginController::class,'reestablecer']);
$router->post('/reestablecer', [LoginController::class,'reestablecer']);

//Confirma la cuenta
$router->get('/mensaje', [LoginController::class,'mensaje']);
$router->get('/confirmar-cuenta', [LoginController::class,'confirmarCuenta']);

//Zona de proyectos
$router->get('/dashboard', [dashboardController::class,'index']);
$router->get('/crear-proyecto', [dashboardController::class,'crearProyecto']);
$router->post('/crear-proyecto', [dashboardController::class,'crearProyecto']);
$router->get('/proyecto', [dashboardController::class,'proyecto']);
$router->get('/perfil', [dashboardController::class,'perfil']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();