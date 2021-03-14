<?php
    /*
     * App Core Class
     * Creates URL & loads core controller
     * URL FORMAT - /controller/method/params
    */
    class Core {
        // Set defaults
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        // Get the URL when this class is instantiated
        public function __construct(){
            //print_r($this->getUrl());

            $url = $this->getUrl();

            // Set base URL to prevent array offset
            // if on root
            $base = isset($url) ? $url[0] : $url;

            // Look in controllers for first value
            if(file_exists('../app/controllers/' . ucwords($base). '.php')){
                // If exists, set as controller
                $this->currentController = ucwords($base);
                // Unset 0 Index
                if(isset($url[0])) {
                    unset($url[0]);
                }
            }

            // Require the controller
            require_once '../app/controllers/'. $this->currentController . '.php';
      
            // Instantiate controller class
            $this->currentController = new $this->currentController;

            // Check for second part of URL
            if(isset($url[1])){
                // Check to see if method exists in controller
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    // Unset 1 index
                    unset($url[1]);
                }
            }

            // Get params
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
          }
      
          public function getUrl(){
            if(isset($_GET['url'])){
              $url = rtrim($_GET['url'], '/');
              $url = filter_var($url, FILTER_SANITIZE_URL);
              $url = explode('/', $url);
              return $url;
            }
          }
        } 