<?php
namespace App\config;
use PDO;
use PDOException;


class Conexion {
    private $servidor = "localhost";
    private $base_datos = "app_contactos";
    private $usuario = "root";
    private $password = "";
    private $pdo;

    public function conectar() {
        try {
            if ($this->pdo == null) {
                $this->pdo = new PDO(
                    "mysql:host={$this->servidor};dbname={$this->base_datos};charset=utf8mb4",
                    $this->usuario,
                    $this->password
                );
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $this->pdo;
        } catch (PDOException $e) {
            die("✖️ Conexión fallida: " . $e->getMessage());
        }
    }
}
?>  
