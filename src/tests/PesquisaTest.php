<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriver;
use src\tests\PageObject\PageLogin;
use src\tests\PageObject\PaginaPesquisa;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class PesquisaTest extends TestCase
{
    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        $host = 'http://localhost:4444/wd/hub';
        $capabilities = DesiredCapabilities::chrome();
        // self::$driver = RemoteWebDriver::create($host, $capabilities);
        $options = new ChromeOptions();
        $options->addArguments(['headless']); 
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);
        self::$driver = RemoteWebDriver::create($host, $capabilities);
    }

    protected function setUp(): void
    {
        self::$driver->get('https://github.com/login');
        $pageLogin = new PageLogin(self::$driver);
        $pageLogin->loginWith('devdouglasfigueiredo@gmail.com', 'masterbuss01');
        $pageLogin->clickToLogin();
    }

    public function testDoASearch()
    {
        $paginaPesquisa = new PaginaPesquisa(self::$driver);
        $paginaPesquisa->toLookFor("behat");
        $paginaPesquisa->clickToSearch();
        $this->assertSame('https://github.com/search?q=behat',self::$driver->getCurrentURL());
    }

    public function tearDown(): void
    {
        self::$driver->close();
    }
}
