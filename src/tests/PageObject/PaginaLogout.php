<?php

namespace src\tests\PageObject;

use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class PaginaLogout
{
    private WebDriver $driver;

    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function efetuarLogout()
    {
        $buttonPerfil = WebDriverBy::cssSelector('body > div.logged-in.env-production.page-responsive.full-width > div.position-relative.js-header-wrapper > header > div.Header-item.position-relative.mr-0.d-none.d-md-flex > details > summary');
        $this->driver->findElement($buttonPerfil)->click();

        
        $buttonSignOut = WebDriverBy::cssSelector("body > div.logged-in.env-production.page-responsive.full-width > div.position-relative.js-header-wrapper > header > div.Header-item.position-relative.mr-0.d-none.d-md-flex > details > details-menu > form > button");
        
        $this->driver->wait(10)->until(
        WebDriverExpectedCondition::visibilityOfElementLocated($buttonSignOut));

        $this->driver->findElement($buttonSignOut)->click();
    }
}