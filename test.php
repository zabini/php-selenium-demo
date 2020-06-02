<?php

require_once __DIR__ . "/vendor/autoload.php";

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

// Chrome
$host = 'http://localhost:4444';

$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

$driver->get('https://semantic-ui.com/behaviors/form.html#content-type');


$randomizer = array(
    function () { // random int
        return rand(0, 100);
    },
    function () {
        return "bb";
    }
);


for ($i = 0; $i < 10; $i++) {

    $element = $driver->findElement(WebDriverBy::xpath('//*[@id="example"]/div[4]/div/div[2]/div[4]/div[2]/div[3]/form/div[1]/div[1]/input'));
    $element->clear();
    $element->sendKeys($randomizer[rand(0, count($randomizer) - 1)]());

    $driver->findElement(WebDriverBy::xpath('//*[@id="example"]/div[4]/div/div[2]/div[4]/div[2]/div[3]/form/div[4]'))->click();

    sleep(1);
}

$driver->close();
