<?php
session_start();

// Autoload de Composer
require __DIR__ . '/../vendor/autoload.php';

use App\controladores\ControladorContacto;
use App\models\Usuario;

$usuario = new Usuario();
$contacto = new ControladorContacto();

$action = $_GET['action'] ?? 'login';

// Función para validar navegacion por url
function validarNavegacionDesdeContactos() {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php?action=login");
        exit;
    }

    if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], "action=contactos") === false) {
        header("Location: index.php?action=contactos");
        exit;
    }
}

switch ($action) {
    case "login":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($usuario->login($_POST['email'], $_POST['password'])) {
                header("Location: index.php?action=contactos");
                exit;
            } else {
                $error = "Credenciales inválidas";
            }
        }
        require __DIR__ . "/Views/login.php";
        break;

    case "registro":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($usuario->registrar($nombre, $email, $password)) {
                header("Location: index.php?action=login");
                exit;
            } else {
                $error = "⚠️ Ya existe una cuenta con ese correo.";
                require __DIR__ . "/Views/registro.php";
            }
        } else {
            require __DIR__ . "/Views/registro.php";
        }
        break;

    case "logout":
        session_destroy();
        header("Location: index.php");
        break;

    case "contactos":
        if (!isset($_SESSION['usuario_id'])) { 
            header("Location: index.php?action=login"); 
            exit; 
        }
        $lista = $contacto->listar($_SESSION['usuario_id']);
        require __DIR__ . "/Views/contactos.php";
        break;

    case "agregar":
        validarNavegacionDesdeContactos();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            if ($contacto->agregar($_SESSION['usuario_id'], $nombre, $telefono, $email)) {
                header("Location: index.php?action=contactos");
                exit;
            } else {
                $error = "⚠️ Ya existe un contacto con ese correo.";
                require __DIR__ . "/Views/agregar.php";
            }
        } else {
            require __DIR__ . "/Views/agregar.php";
        }
        break;

    case "editar":
        validarNavegacionDesdeContactos();
        $id = $_GET['id'] ?? null;
        $c = $contacto->modelo->obtenerPorId($id, $_SESSION['usuario_id']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contacto->editar($id, $_SESSION['usuario_id'], $_POST['nombre'], $_POST['telefono'], $_POST['email']);
            header("Location: index.php?action=contactos");
            exit;
        }
        require __DIR__ . "/Views/editar.php";
        break;

    case "eliminar":
        validarNavegacionDesdeContactos();
        $id = $_GET['id'] ?? null;
        $c = $contacto->modelo->obtenerPorId($id, $_SESSION['usuario_id']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contacto->eliminar($id, $_SESSION['usuario_id']);
            header("Location: index.php?action=contactos");
            exit;
        }
        require __DIR__ . "/Views/eliminar.php";
        break;

    default:
        header("Location: index.php?action=login");
        break;
}
