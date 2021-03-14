<?php
    /*
     * Base Controller
     * Loads the models and views
     */
    Class Controller {
        // Load model
        public function model($model){
            // Require model file
            require_once '../app/models/' . $model . '.php';

            // Instantiate model
            return new $model();
        }

        // Load view
        // Pass data in using $data
        public function view($view, $data = []){
            // Check for view file
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }
            else {
                // Die if the file does not exist
                die('View does not exist');
            }
        }
    }