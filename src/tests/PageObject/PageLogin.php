<?php

namespace src\tests\PageObject;

use Exception;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;


class PageLogin
{
    private WebDriver $driver;

    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function loginWith(string $email, string $password)
    {
        $inputEmail = WebDriverBy::id('login_field');
        $this->driver->findElement($inputEmail)->sendKeys(['user' => $email]);

        $inputPassword = WebDriverBy::id('password');
        $this->driver->findElement($inputPassword)->sendKeys(['pass' => $password]);

    }   

    public function clickToLogin()
    {   
        $buttonlogin = WebDriverBy::className('js-sign-in-button');

        if (!$buttonlogin) {
            throw new Exception("Elemento não encontrado");
            
        }

        $this->driver->findElement($buttonlogin)->click();
        
    }   
}
