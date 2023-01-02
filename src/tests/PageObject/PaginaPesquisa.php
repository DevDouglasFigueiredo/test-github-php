<?php

namespace src\tests\PageObject;

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
        $inputPesquisa = WebDriverBy::cssSelector('body > div.logged-in.env-production.page-responsive.full-width > div.position-relative.js-header-wrapper > header > div.Header-item.Header-item--full.flex-column.flex-md-row.width-full.flex-order-2.flex-md-order-none.mr-0.mt-3.mt-md-0.Details-content--hidden-not-important.d-md-flex > div > div > form > label');

        $this->driver->findElement($inputPesquisa)->sendKeys($nome);
    }

    public function clicarParaPesquisar()   
    {
        $clickPesquisa = WebDriverBy::cssSelector('#jump-to-suggestion-search-global > a > div.border.rounded-2.flex-shrink-0.color-bg-subtle.px-1.color-fg-muted.ml-1.f6.js-jump-to-badge-search > span.js-jump-to-badge-search-text-global');

        $this->driver->findElement($clickPesquisa)->click();
    }
}
