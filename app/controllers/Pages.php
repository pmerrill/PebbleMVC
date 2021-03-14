<?php
    class Pages extends Controller {
        public function __construct(){
            //echo 'Pages loaded';
            $this->postModel = $this->model('Post');
        }

        // Default method
        // Index for call_user_func_array
        public function index(){
            $posts = $this->postModel->getPosts();
            
            $data = [
                'title' => 'Welcome',
                'posts' => $posts
            ];
            
            // Pass in file name and optional array of data
            $this->view('pages/index', $data);
        }

        // About page
        public function about(){
            $data = [
                'title' => 'About'
            ];

            // Pass in file name and optional array of data
            $this->view('pages/about', $data);
        }
    }