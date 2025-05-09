<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\WebDriverBy;

require_once 'vendor/autoload.php';

class CursosSinSesionTest extends PHPUnit\Framework\TestCase
{
    protected $driver;

    protected function setUp(): void
    {
        $host = 'http://localhost:4444'; // Puerto estándar de Selenium
        $options = new \Facebook\WebDriver\Chrome\ChromeOptions();
        $options->addArguments(['--headless', '--disable-gpu']); // Opcional, si no quieres abrir el navegador

        $this->driver = RemoteWebDriver::create(
            'http://localhost:4444',
            $options->toCapabilities()
        );
    }

    public function testBotonInscribirseDesactivadoSinSesion()
    {
        // Abre la página
        $this->driver->get('http://localhost/MantProyecto/cursos.php');

        // Espera que cargue el botón
        usleep(1000000); // espera 1 segundo

        // Busca el botón
        $boton = $this->driver->findElement(WebDriverBy::id('inscribirseBtn'));

        // Verifica si el botón está deshabilitado (puedes ajustar la lógica según tu HTML/CSS)
        $disabled = $boton->getAttribute('disabled');
        $this->assertEquals('true', $disabled);
    }

    protected function tearDown(): void
    {
        $this->driver->quit();
    }
}
