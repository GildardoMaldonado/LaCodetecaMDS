<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/uploadLogic.php';

class UploadTest extends TestCase
{
    private function crearArchivoTemporal($tipoMime = 'image/jpeg', $extension = 'jpg', $tamaño = 500000) {
        $tmpFile = tempnam(sys_get_temp_dir(), 'img_');

        // Ajustar tamaño dinámicamente si se requiere uno específico
        $dimension = $tamaño > 2000000 ? 3000 : 100;
        $imagen = imagecreatetruecolor($dimension, $dimension);

        if ($extension === 'png') {
            imagepng($imagen, $tmpFile);
        } elseif ($extension === 'gif') {
            imagegif($imagen, $tmpFile);
        } else {
            imagejpeg($imagen, $tmpFile, 100); // calidad alta
        }

        imagedestroy($imagen);

        return [
            'name' => 'prueba.' . $extension,
            'tmp_name' => $tmpFile,
            'size' => filesize($tmpFile),
            'type' => $tipoMime,
            'error' => 0
        ];
    }

    public function testSubidaCorrectaJPG()
    {
        $file = $this->crearArchivoTemporal();
        $this->assertTrue(procesarSubidaDeImagen('usuario_test', $file, true)['success']);
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
        $resultado = procesarSubidaDeImagen('usuario_test', $file, true);
        $this->assertFalse($resultado['success']);
        $this->assertEquals('El archivo no es una imagen.', $resultado['message']);
    }

    public function testArchivoMuyGrande()
    {
        $file = $this->crearArchivoTemporal('image/png', 'png', 3000000);
        $file['size'] = 3000001; // Forzar que sea mayor a 2MB
        $resultado = procesarSubidaDeImagen('usuario_test', $file, true);
        $this->assertFalse($resultado['success']);
        $this->assertEquals('El archivo es demasiado grande.', $resultado['message']);
    }

    public function testExtensionNoPermitida()
    {
        $file = $this->crearArchivoTemporal('image/gif', 'gif');
        $resultado = procesarSubidaDeImagen('usuario_test', $file, true);
        $this->assertFalse($resultado['success']);
        $this->assertEquals('Solo se permiten archivos JPG, JPEG y PNG.', $resultado['message']);
    }

    protected function tearDown(): void
    {
        // Eliminar archivos temporales
        $uploadsDir = 'uploads/';
        if (is_dir($uploadsDir)) {
            $archivos = glob($uploadsDir . '*');
            foreach ($archivos as $archivo) {
                unlink($archivo);
            }
        }
    }

}
