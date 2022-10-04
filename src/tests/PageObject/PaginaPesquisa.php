<?php

namespace Src\tests\PageObject;

use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;

class PaginaPesquisa
{
    private WebDriver $driver;
    
    
    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function realizarBusca(string $nome)
    {
        $this->driver->findElement(WebDriverBy::className('js-site-search-focus"'))->sendKeys($nome);
    }

    public function clicarParaPesquisar()
    {
        $this->driver->findElement(WebDriverBy::cssSelector("#jump-to-suggestion-search-global > a > div > .js-jump-to-badge-search-text-global"))->click();    }

    
}