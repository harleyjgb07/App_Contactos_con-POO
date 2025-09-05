<?php
namespace App\config;
namespace App\models;

use PDO;
use App\config\Conexion;

class Contacto {
    private $pdo;
    
    public function __construct() {
        $conexion = new Conexion();
        $this->pdo = $conexion->conectar();
    }

    public function obtenerTodos($usuario_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contactos WHERE usuario_id=?");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($usuario_id, $nombre, $telefono, $email) {
        $stmt = $this->pdo->prepare("SELECT id FROM contactos WHERE usuario_id=? AND email=?");
        $stmt->execute([$usuario_id, $email]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return false; // ya existe → no insertar
        }

        // 🔹 Insertar nuevo contacto
        $stmt = $this->pdo->prepare("INSERT INTO contactos (usuario_id, nombre, telefono, email) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$usuario_id, $nombre, $telefono, $email]);
    }

    public function obtenerPorId($id, $usuario_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contactos WHERE id=? AND usuario_id=?");
        $stmt->execute([$id, $usuario_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $usuario_id, $nombre, $telefono, $email) {
        $stmt = $this->pdo->prepare("UPDATE contactos SET nombre=?, telefono=?, email=? WHERE id=? AND usuario_id=?");
        return $stmt->execute([$nombre, $telefono, $email, $id, $usuario_id]);
    }

    public function eliminar($id, $usuario_id) {
        $stmt = $this->pdo->prepare("DELETE FROM contactos WHERE id=? AND usuario_id=?");
        return $stmt->execute([$id, $usuario_id]);
    }
}