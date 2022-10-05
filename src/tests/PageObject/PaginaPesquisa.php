<?php

namespace Src\tests\PageObject;

use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class PaginaPesquisa
{
    private WebDriver $driver;
    
    
    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    
    public function realizarBusca(string $nome): self
    {   
        $inputPesquisa = WebDriverBy::className('form-control js-site-search-focus header-search-input jump-to-field js-jump-to-field');
        $elementoInputPesquisa = $this->driver->findElements($inputPesquisa);
        
        $elementoInputPesquisa[0]->sendKeys($nome);

        // $this->driver->wait(10, 1000)->until(WebDriverExpectedCondition::visibilityOf($elementoInputPesquisa));


        return $this;

    }

    // public function clicarParaPesquisar()
    // {   
    //     $clickPesquisa = WebDriverBy::cssSelector("#jump-to-suggestion-search-global > a > div > .js-jump-to-badge-search-text-global");

    //     $this->driver->findElement($clickPesquisa)->click(); 
    // }

    
}

