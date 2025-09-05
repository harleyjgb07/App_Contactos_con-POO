<?php
namespace App\controladores;

use App\models\Contacto;

class ControladorContacto {
    public $modelo; 

    public function __construct() {
        $this->modelo = new Contacto();
    }

    public function listar($usuario_id) {
        return $this->modelo->obtenerTodos($usuario_id);
    }

    public function agregar($usuario_id, $nombre, $telefono, $email) {
        return $this->modelo->agregar($usuario_id, $nombre, $telefono, $email);
    }

    public function editar($id, $usuario_id, $nombre, $telefono, $email) {
        return $this->modelo->actualizar($id, $usuario_id, $nombre, $telefono, $email);
    }

    public function eliminar($id, $usuario_id) {
        return $this->modelo->eliminar($id, $usuario_id);
    }
}
