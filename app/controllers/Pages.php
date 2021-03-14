<?php
    class Pages {
        public function __construct(){
            //echo 'Pages loaded';
        }

        // Index for call_user_func_array
        public function index(){

        }

        public function about($id){
            echo $id;
        }
    }