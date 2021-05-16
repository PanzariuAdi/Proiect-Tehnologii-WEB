<?php 
    class Users extends Controller{
        public function __construct() {}

        public function register() {
            // Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //process form
            } else {
                // init data
                $data = [
                    'name' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'password_err' => '',
                    'confirm_password_err'
                ];

                // Load view
                $this->view('pages/login', $data);
            }
        }
    }