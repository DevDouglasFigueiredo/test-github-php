<?php

namespace Src\tests\PageObject;


use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;


class PaginaLogin
{
    private WebDriver $driver;

    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function realizarLoginCom(string $email, string $senha): void
    {
        $this->driver->get('https://github.com/login');

        $inputEmail = WebDriverBy::id('login_field');
        $this->driver->findElement($inputEmail)->sendKeys($email);

        $inputPassword = WebDriverBy::id('password');
        $this->driver->findElement($inputPassword)->sendKeys($senha);

    }
}
