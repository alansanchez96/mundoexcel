<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AccountController;
use Controllers\AppController;
use Controllers\AuthController;
use MVC\Router;

$router = new Router();

/* USERS */

// Main
$router->get('/', [AppController::class, 'index']);
$router->post('/', [AppController::class, 'index']);

// Cursos
$router->get('/cursos', [AppController::class, 'cursos']);
$router->post('/cursos', [AppController::class, 'cursos']);

// Quienes Somos?
$router->get('/quienes-somos', [AppController::class, 'nosotros']);

// Contacto
$router->get('/contacto', [AppController::class, 'contacto']);
$router->post('/contacto', [AppController::class, 'contacto']);

// Suscripcion
$router->get('/suscripcion', [AppController::class, 'suscripcion']);
$router->post('/suscripcion', [AppController::class, 'suscripcion']);

// Login & Logout
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);
// Crear cuenta
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);

$router->get('/confirmacion', [AuthController::class, 'confirm']);
$router->get('/mensaje', [AuthController::class, 'message']);
// Recuperar contraseña
$router->get('/recover/email', [AuthController::class, 'recoverEmail']);
$router->post('/recover/email', [AuthController::class, 'recoverEmail']);
$router->get('/recover/dni', [AuthController::class, 'recoverDni']);
$router->post('/recover/dni', [AuthController::class, 'recoverDni']);

$router->get('/recover/restore', [AuthController::class, 'restore']);
$router->post('/recover/restore', [AuthController::class, 'restore']);


/* USUARIOS & ADMIN */
// {Usuarios}
$router->get('/account/dashboard', [AccountController::class, 'index']);
// Editar Perfil
$router->get('/account/basic-information', [AccountController::class, 'editar']);
$router->post('/account/basic-information', [AccountController::class, 'editar']);
// Pagos
$router->get('/account/payments', [AccountController::class, 'payments']);
$router->post('/account/payments', [AccountController::class, 'payments']);
// Certificados
$router->get('/account/my-certificates', [AccountController::class, 'certificados']);
// Cursos
$router->get('/account/my-courses', [AccountController::class, 'courses']);
// Config
$router->get('/account/security', [AccountController::class, 'security']);
$router->post('/account/security', [AccountController::class, 'security']);
// Nuevo Email
$router->get('/account/newemail', [AccountController::class, 'newEmail']);
$router->post('/account/newemail', [AccountController::class, 'newEmail']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();