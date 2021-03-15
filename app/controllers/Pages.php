<?php
    class Pages extends Controller {
        public function __construct(){
            //echo 'Pages loaded';
        }

        // Default method
        // Index for call_user_func_array
        public function index(){
            
            $data = [
                'title' => SITENAME . ' PHP Framework',
                'description' => 'This is the ' . SITENAME . ' PHP framework. Please refer to the <a href="https://github.com/pmerrill/PebbleMVC" target="_blank">documentation on GitHub</a> for more information.',
            ];
            
            // Pass in file name and optional array of data
            $this->view('pages/index', $data);
        }

        // About page
        public function about(){
            $data = [
                'title' => 'About ' . SITENAME,
                'description' => '...'
            ];

            // Pass in file name and optional array of data
            $this->view('pages/about', $data);
        }
    }