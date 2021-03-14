<?php
    // Load Config
    require_once 'config/config.php';
    
    // Autoload Core Libraries
     // Your file names and class names must be
     // an exact match for this to work
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });