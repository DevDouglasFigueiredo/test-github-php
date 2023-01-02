<?php

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriver;
use src\tests\PageObject\PaginaLogin;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use src\tests\PageObject\PaginaLogout;

class LogoutTest extends TestCase
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

    public function testEfetuandoLogout()
    {
        $paginaLogout = new PaginaLogout(self::$driver);
        $paginaLogout->efetuarLogout();
        $this->assertSame('https://github.com/', self::$driver->getCurrentURL());
    }

    public function tearDown(): void
    {
        self::$driver->close();
    }
}
