<?php

require __DIR__ . '/vendor/autoload.php';

use JaronSteenson\App\AppBootstrap;
use JaronSteenson\App\CustomerImport;
use JaronSteenson\App\Models\Customer;

(new AppBootstrap())->bootApp();


if (php_sapi_name() === 'cli' && $argv[1] === 'import-customers') {
    $importRunStatus = (new CustomerImport())->run()->runStatus;
    echo $importRunStatus;
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/php-js-dev-test-master/') {
    require __DIR__ . '/html/App.html';
}
else if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/php-js-dev-test-master/customer') {
    header('Content-Type: application/json');
    /** @noinspection PhpDynamicAsStaticMethodCallInspection */
    echo Customer::orderBy('firstName')->get();
}
else {
    http_response_code(404);
}