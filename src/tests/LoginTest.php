<?php


use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriver;
use src\tests\PageObject\PageLogin;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class LoginTest extends TestCase
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
  }

  public function testAcessLoginScreen()
  {

    $pageLogin = new PageLogin (self::$driver);
    $pageLogin->loginWith('devdouglasfigueiredo@gmail.com', 'masterbuss01');
    $pageLogin->clickToLogin();
    $this->assertSame('https://github.com/', self::$driver->getCurrentURL());
    // $this->assertStringContainsString('Top Repositories', self::$driver->getPageSource());
  }

  public function tearDown(): void
  {
    self::$driver->close();
  }

}