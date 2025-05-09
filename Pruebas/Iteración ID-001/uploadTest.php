<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../uploadLogic.php';

class UploadTest extends TestCase
{
    private function crearArchivoTemporal($tipoMime = 'image/jpeg', $extension = 'jpg', $tamaño = 500000) {
        $tmpFile = tempnam(sys_get_temp_dir(), 'img_');
        file_put_contents($tmpFile, str_repeat('x', $tamaño));
        return [
            'name' => 'prueba.' . $extension,
            'tmp_name' => $tmpFile,
            'size' => $tamaño,
            'type' => $tipoMime,
            'error' => 0
        ];
    }

    public function testSubidaCorrectaJPG()
    {
        $file = $this->crearArchivoTemporal();
        $this->assertTrue(procesarSubidaDeImagen('usuario_test', $file)['success']);
    }

    public function testSubidaArchivoNoImagen()
    {
        $tmp = tempnam(sys_get_temp_dir(), 'txt_');
        file_put_contents($tmp, 'texto plano');

        $file = [
            'name' => 'archivo.txt',
            'tmp_name' => $tmp,
            'size' => 1000,
            'type' => 'text/plain',
            'error' => 0
        ];
        $resultado = procesarSubidaDeImagen('usuario_test', $file);
        $this->assertFalse($resultado['success']);
        $this->assertEquals('El archivo no es una imagen.', $resultado['message']);
    }

    public function testArchivoMuyGrande()
    {
        $file = $this->crearArchivoTemporal('image/png', 'png', 3000000);
        $resultado = procesarSubidaDeImagen('usuario_test', $file);
        $this->assertFalse($resultado['success']);
        $this->assertEquals('El archivo es demasiado grande.', $resultado['message']);
    }

    public function testExtensionNoPermitida()
    {
        $file = $this->crearArchivoTemporal('image/gif', 'gif');
        $resultado = procesarSubidaDeImagen('usuario_test', $file);
        $this->assertFalse($resultado['success']);
        $this->assertEquals('Solo se permiten archivos JPG, JPEG y PNG.', $resultado['message']);
    }
}
