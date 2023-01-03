<?php

namespace src\tests\PageObject;


use Exception;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;


class PageSearch
{
    private WebDriver $driver;

    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function toLookFor(string $name)
    {
        $inputSearch = WebDriverBy::cssSelector('body > div.logged-in.env-production.page-responsive.full-width > div.position-relative.js-header-wrapper > header > div.Header-item.Header-item--full.flex-column.flex-md-row.width-full.flex-order-2.flex-md-order-none.mr-0.mt-3.mt-md-0.Details-content--hidden-not-important.d-md-flex > div > div > form > label');

        $this->driver->findElement($inputSearch)->sendKeys($name);
    }

    public function clickToSearch()
    {
        $clickSearch = WebDriverBy::cssSelector('#jump-to-suggestion-search-global > a > div.border.rounded-2.flex-shrink-0.color-bg-subtle.px-1.color-fg-muted.ml-1.f6.js-jump-to-badge-search > span.js-jump-to-badge-search-text-global');

        $this->driver->wait(10)->until(
            WebDriverExpectedCondition::visibilityOfElementLocated($clickSearch)
        );

        if (!$clickSearch) {
            throw new Exception("Elemento não encontrado");
        }

        $this->driver->findElement($clickSearch)->click();
    }
}
