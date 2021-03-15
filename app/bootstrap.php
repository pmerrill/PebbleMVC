<?php
    // Load Config
    require_once 'config/config.php';

    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    
    // Autoload Core Libraries
     // Your file names and class names must be
     // an exact match for this to work
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });