<?php

use SilverStripe\Security\PasswordValidator;
use SilverStripe\Security\Member;

if (isset($_GET['d']) && ($db = $_GET['d'])) {
    global $databaseConfig;
    if ($db == 'l') {
        $databaseConfig['type'] = 'SQLite3Database';
        $databaseConfig['path'] = ':memory:';
    }
}

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
$validator->setMinLength(8);
$validator->setHistoricCount(6);
Member::set_password_validator($validator);
