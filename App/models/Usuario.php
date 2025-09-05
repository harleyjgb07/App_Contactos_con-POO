<?php
namespace App\models; 

use App\config\Conexion;
use PDO;

class Usuario {
    private $pdo;

    public function __construct() {
        require_once __DIR__ . "/../config/conexion.php";
        $conexion = new Conexion();
        $this->pdo = $conexion->conectar();
    }

    public function registrar($nombre, $email, $password) {
    // Verificar si ya existe un usuario con ese correo
    $stmt = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        // Ya existe → no se registra
        return false;
    }

    // Si no existe, registrar
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$nombre, $email, $hash]);
}

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email=?");
        $stmt->execute([$email]);
        $u = $stmt->fetch();
        if ($u && password_verify($password, $u['password'])) {
            $_SESSION['usuario_id'] = $u['id'];
            $_SESSION['usuario_nombre'] = $u['nombre'];
            return true;
        }
        return false;
    }
}