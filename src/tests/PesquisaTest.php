<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use src\tests\PageObject\PaginaLogin;
use src\tests\PageObject\PaginaPesquisa;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class PesquisaTest extends TestCase
{
    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        $host = 'http://localhost:4444/wd/hub';
        $capabilities = DesiredCapabilities::chrome();
        self::$driver = RemoteWebDriver::create($host, $capabilities);
    }

    protected function setUp(): void
    {
        self::$driver->get('https://github.com/login');
        $paginaLogin = new PaginaLogin(self::$driver);
        $paginaLogin->realizarLoginCom('devdouglasfigueiredo@gmail.com', 'masterbuss01');
        $paginaLogin->clicarParaLogar();
    }

    public function testRealizarPesquisa()
    {
        $paginaPesquisa = new PaginaPesquisa(self::$driver);
        $paginaPesquisa->realizarBusca("behat");
        $paginaPesquisa->clicarParaPesquisar();
        $this->assertSame('https://github.com/search?q=behat',self::$driver->getCurrentURL());
    }

    public function tearDown(): void
    {
        self::$driver->close();
    }
}
