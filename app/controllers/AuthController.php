<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/DataBase.php';
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function login($datos)
    {
        $usuario = User::buscarPorUsuario($datos['nombreUsuario']);
        if ($usuario && password_verify($datos['contrasena'], $usuario['contrasena'])) {
            $_SESSION['idUsuario'] = $usuario['idUsuario'];
            $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['apellido'] = $usuario['apellido'];
            $_SESSION['email'] = $usuario['email'];
            echo json_encode(['status' => 'success', 'msg' => 'Ingreso Exitoso']);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Credenciales incorrectas']);
        }
    }
    public function registrar($datos)
    {
        $usuario = new User($datos['nombreUsuario'], $datos['email'], $datos['nombre'], $datos['apellido'], $datos['contrasena']);
        if ($usuario->guardarInformacion()) {
            echo json_encode(['status' => 'success', 'msg' => 'Registro Exitoso']);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Error al Registrar el Usuario']);
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        echo json_encode(['status' => 'success', 'msg' => 'Sesion Cerrada Exitosamente']);
    }
}

//manejador de peticiones ajax
header('Content-Type: application/json');
$action = $_GET['action'] ?? '';
$json = file_get_contents('php://input');
$datos = json_decode($json, true);
$controller = new AuthController();

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login($datos);
        }
        break;
    case 'registrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->registrar($datos);
        }
        break;
    case 'logout':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->logout();
        }
        break;
    case 'check_session':
        if (isset($_SESSION['idUsuario'])) {
            echo json_encode(['status' => 'active', 'user' => $_SESSION['nombreUsuario']]);
        } else {
            echo json_encode(['status' => 'inactive']);
        }
        break;

    default:
        echo json_encode(['status' => 'error', 'msg' => 'Accion no valida']);
        break;
}
