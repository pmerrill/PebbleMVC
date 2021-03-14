<?php
    // App Root
    // We only want the parent path
    define('APPROOT', dirname(dirname(__FILE__)));

    // URL Root
    // Make sure to change this to match your config
    define('URLROOT', 'http://localhost/PebbleMVC');

    // Site Name
    define('SITENAME', 'PebbleMVC');

    // CSS Version
     // Cache-busting technique
    define('CSS_VERSION', 1);

    // JS Version
     // Cache-busting technique
    define('JS_VERSION', 1);

    // Database Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'pmvc');