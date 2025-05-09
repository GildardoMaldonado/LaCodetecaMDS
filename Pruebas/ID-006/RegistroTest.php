<?php
use PHPUnit\Framework\TestCase;

class RegistroTest extends TestCase
{
    protected $conexion;

    protected function setUp(): void
    {
        // Incluye el archivo de conexión y copia $conexion a $this->conexion
        require dirname(__FILE__) . '/conexionBD.php';
        $this->conexion = $conexion;

        // Limpieza previa
        $this->conexion->query("DELETE FROM usuarios WHERE correo LIKE 'test%'");
    }

    public function testInsercionValida()
    {
        $correo = 'testuser@example.com';
        $contrasenia = password_hash('123456', PASSWORD_DEFAULT);
        $nombre = 'Usuario de Prueba';

        $stmt = $this->conexion->prepare("INSERT INTO usuarios (correo, contrasenia, nombre) VALUES (?, ?, ?)");

        $stmt->bind_param("sss", $correo, $contrasenia, $nombre);
        $resultado = $stmt->execute();

        $this->assertTrue($resultado);

        $res = $this->conexion->query("SELECT * FROM usuarios WHERE correo = '$correo'");
        $this->assertEquals(1, $res->num_rows);
    }

    public function testInyeccionSQLBloqueada()
    {
        $correo_malicioso = "test@example.com' OR '1'='1";
        $contrasenia = password_hash('123456', PASSWORD_DEFAULT);
        $nombre = 'Hacker';

        $stmt = $this->conexion->prepare("INSERT INTO usuarios (correo, contrasenia, nombre) VALUES (?, ?, ?)");

        $stmt->bind_param("sss", $correo_malicioso, $contrasenia, $nombre);
        $resultado = $stmt->execute();

        $this->assertTrue($resultado);

        // Verifica que la entrada maliciosa no fue interpretada como SQL, solo insertada literalmente
        $res = $this->conexion->query("SELECT * FROM usuarios WHERE correo = '$correo_malicioso'");
        $this->assertEquals(1, $res->num_rows);
    }

    protected function tearDown(): void
    {
        $this->conexion->query("DELETE FROM usuarios WHERE 1=1");
        $this->conexion->close();
    }
}
