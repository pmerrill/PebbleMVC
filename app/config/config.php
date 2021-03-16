<?php
    // App Root
    // We only want the parent path
    define('APPROOT', dirname(dirname(__FILE__)));

    // URL Root
    // Make sure to change this to match your config.
    // Do not include the trailing slash.
    /*
    define('URLROOT', '_YOUR_URL_');
    */
    define('URLROOT', 'http://localhost/PebbleMVC');

    // Site Name
    define('SITENAME', 'PebbleMVC');

    // Database Params
    /*
    define('DB_HOST', 'localhost');
    define('DB_USER', '_YOUR_USER');
    define('DB_PASS', '_YOUR_PASSWORD_');
    define('DB_NAME', '_YOUR_DBNAME_');
    */
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'pmvc');

    // App Version
    define('APPVERSION', '1.0.0');