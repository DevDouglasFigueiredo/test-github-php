<?php


require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Src\tests\PageObject\PaginaLogin;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;





class loginTest extends TestCase
{

  private static WebDriver $driver;

  public static function setUpBeforeClass(): void
  {
    $host = 'http://localhost:4444/wd/hub';
    $capabilities = DesiredCapabilities::chrome();
    self::$driver = RemoteWebDriver::create($host, $capabilities);

    
  }


  protected function setUp(): void // metodo para executar essa operação em todos os testes, para nao precisar de repetição de codigo 
  {

    self::$driver->get('https://github.com/login');
  }

  public function testAcessarTelaDeLogin()
  {

    $paginaLogin = new PaginaLogin(self::$driver);
    $paginaLogin->realizarLoginCom('devdouglasfigueiredo@gmail.com', 'masterbuss01');

   
    $h1Locator = WebDriverBy::tagName('h1');
    $textoh1 = self::$driver->findElement($h1Locator)->getText();

    $this->assertStringContainsString('Sign in to GitHub', $textoh1);

    self::$driver->findElement(WebDriverBy::className('js-sign-in-button'))->click();

    $this->assertSame('https://github.com/', self::$driver->getCurrentURL());

    self::$driver->findElement(WebDriverBy::id('feed-original'))->getText();
  }

  public static function tearDownAfterClass(): void // metodo para fechamento do navegador
  {
    self::$driver->close();
  }
}
