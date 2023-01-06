<?php


use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriver;
use src\tests\PageObject\PageLogin;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

// include_once dirname(__FILE__) .'commosConstants.php';

class LoginTest extends TestCase
{

  private static WebDriver $driver;
  private PageLogin $pageLogin;

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
    $this->pageLogin = new PageLogin(self::$driver);
    
  }
  
  /**
   * @dataProvider dataTestEfetuarLoginComSucesso
   */
  public function testLoginWithErrors($user, $pass)
  { 
    
    $this->pageLogin->loginWith($user, $pass);
    $this->pageLogin->clickToLogin();
    $this->assertSame('https://github.com/session', self::$driver->getCurrentURL());
    $this->assertStringContainsStringIgnoringCase('Sign in to GitHub', self::$driver->getTitle());
    $this->assertStringNotContainsString('Start coding instantly with GitHub Codespaces', self::$driver->getTitle());
  }

  /**
   * @loginSucesso
   */
  public function testLoginWithSucess()
  {
    $this->pageLogin->loginWith("devdouglasfigueiredo@gmail.com", 'masterbuss01');
    $this->pageLogin->clickToLogin();
    $this->assertSame('https://github.com/', self::$driver->getCurrentURL());

  }

  public function dataTestEfetuarLoginComSucesso(): array
  {
    
    return [
      'UsuarioInexistente' => ['email@gmail.com', 'senha001'],
      'loginComUsuarioInvalido' => ['devdouglasfigueiredo@gmail.commmmm','(inserir uma senha valida para teste)'],
      'loginComSenhaInvalida' => ['devdouglasfigueiredo@gmail.com','senhaTesteInvalida'],
      'campoUsuarioVazio' => ["",'(inserir uma senha valida para teste)'],
      'campoSenhaVazio' => ['devdouglasfigueiredo@gmail.com',""],
    ];
  }

  public static function tearDownAfterClass(): void
  {
    self::$driver->close();
  }
}
