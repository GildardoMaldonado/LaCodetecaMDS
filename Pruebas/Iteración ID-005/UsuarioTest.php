<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../conexionBD.php';
require_once __DIR__ . '/../servicios/UsuarioService.php';

class UsuarioTest extends TestCase
{
    private $conexion;

    protected function setUp(): void
    {
        $this->conexion = new mysqli('localhost', 'root', '', 'test_db');
        $this->conexion->query("DELETE FROM usuarios WHERE correo LIKE 'testuser%@test.com'");
    }

    public function testCrearUsuarioAdministrador()
    {
        $resultado = crearUsuario($this->conexion, 'testuser1@test.com', '1234', 'AdminTest', true);
        $this->assertTrue($resultado);

        $res = $this->conexion->query("SELECT * FROM usuarios WHERE correo = 'testuser1@test.com'");
        $this->assertEquals(1, $res->num_rows);

        $usuario = $res->fetch_assoc();
        $this->assertEquals(1, $usuario['es_admin']);
    }

    public function testAutenticacionExitosa()
    {
        crearUsuario($this->conexion, 'testuser2@test.com', 'admin123', 'Test Admin', true);
        
        $usuario = autenticarUsuario($this->conexion, 'testuser2@test.com', 'admin123');
        $this->assertIsArray($usuario);
        $this->assertEquals('Test Admin', $usuario['nombre']);
        $this->assertEquals(1, $usuario['es_admin']);
    }

    public function testAutenticacionFallida()
    {
        crearUsuario($this->conexion, 'testuser3@test.com', 'admin123', 'Test Admin', true);
        
        $usuario = autenticarUsuario($this->conexion, 'testuser3@test.com', 'wrongpass');
        $this->assertFalse($usuario);
    }

    protected function tearDown(): void
    {
        $this->conexion->query("DELETE FROM usuarios WHERE correo LIKE 'testuser%@test.com'");
        $this->conexion->close();
    }
}