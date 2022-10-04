<?php

// use loginTest;
// use Facebook\WebDriver\WebDriverBy;
// use Facebook\WebDriver\Remote\RemoteWebDriver;
// use Facebook\WebDriver\Remote\DesiredCapabilities;
// use Facebook\WebDriver\WebDriver;
// use PHPUnit\Framework\TestCase;

// class pesquisaTest extends TestCase
// {

//     private WebDriver $driver;

//     protected function setUp(): void
//     {
//         $host = 'http://localhost:4444/wd/hub';
//         $capabilities = DesiredCapabilities::chrome();
//         $this->driver = RemoteWebDriver::create($host, $capabilities);

//         $this->driver->get('https://github.com/login');
//         $inputEmail = WebDriverBy::id('login_field');
//         $loginEmail = 'devdouglasfigueiredo@gmail.com';

//         $this->driver->findElement($inputEmail)->sendKeys($loginEmail);

//         $inputPassword = WebDriverBy::id('password');
//         $loginPassword = 'masterbuss01';

//         $this->driver->findElement($inputPassword)->sendKeys($loginPassword);

//         $this->driver->findElement(WebDriverBy::className('js-sign-in-button'))->click();
//     }

//     protected function tearDown(): void
//     {
//         $this->driver->close();
//     }

//     public function testRealizarPesquisaComSucesso()
//     {


//         $this->driver->findElement(WebDriverBy::cssSelector('.js-site-search-focus"'))->sendKeys('behat');

//         $this->driver->findElement(WebDriverBy::cssSelector(
//             '#jump-to-suggestion-search-global > a > div > .js-jump-to-badge-search-text-global'
//         ))->click();

//         self::assertSame('https://github.com/search?q=behat', $this->driver->getCurrentURL());
//     }
// }
