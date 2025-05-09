<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/UsuarioRepositorio.php';


class UsuarioRepositorioTest extends TestCase {
    private $conexion;

    protected function setUp(): void {
        // Conecta a tu base de datos de pruebas
        $this->conexion = new mysqli('localhost', 'root', '', 'test_db');

        // Crea la tabla si no existe
        $this->conexion->query("CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            correo VARCHAR(255) NOT NULL UNIQUE,
            contrasenia VARCHAR(255),
            nombre VARCHAR(255),
            es_admin TINYINT(1)
        )");

        // Limpia la tabla antes de cada prueba
        $this->conexion->query("DELETE FROM usuarios");
    }

    protected function tearDown(): void {
        // Borra la tabla al finalizar (opcional, para aislamiento total)
        $this->conexion->query("DROP TABLE IF EXISTS usuarios");
        $this->conexion->close();
    }

    public function testUsuarioExisteRetornaTrueSiElUsuarioExiste() {
        $correo = 'test@example.com';
        $this->conexion->query("INSERT INTO usuarios (correo, contrasenia, nombre, es_admin)
                                VALUES ('$correo', 'x', 'Test', 0)");

        $repo = new UsuarioRepositorio($this->conexion);
        $this->assertTrue($repo->usuarioExiste($correo));
    }

    public function testUsuarioExisteRetornaFalseSiElUsuarioNoExiste() {
        $repo = new UsuarioRepositorio($this->conexion);
        $this->assertFalse($repo->usuarioExiste('nuevo@example.com'));
    }

    public function testUsuarioExistenteNoSeInsertaEnLaBaseDeDatos() {
        $correo = 'ya_registrado@example.com';
        $this->conexion->query("INSERT INTO usuarios (correo, contrasenia, nombre, es_admin)
                                VALUES ('$correo', 'x', 'Ya existe', 0)");

        $repo = new UsuarioRepositorio($this->conexion);

        if ($repo->usuarioExiste($correo)) {
            $mensaje = 'El usuario ya está registrado';
        } else {
            $mensaje = 'Usuario insertado';
        }

        $this->assertEquals('El usuario ya está registrado', $mensaje);
    }
}