<?php
error_reporting(E_ALL);
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase {
    public function testNoSesionBotonDebeEstarDeshabilitado() {
        $_SESSION = [];  // No sesión activa
        ob_start();
        include 'cursos.php';  // Ruta al archivo con la lógica
        $output = ob_get_clean();

        $this->assertStringContainsString('id="inscribirseBtn" disabled', $output);
    }

    public function testSesionActivaBotonDebeEstarHabilitado() {
        $_SESSION['nombre_s'] = 'Juan';
        ob_start();
        include 'cursos.php';
        $output = ob_get_clean();

        $this->assertStringNotContainsString('disabled', $output);
    }
}
