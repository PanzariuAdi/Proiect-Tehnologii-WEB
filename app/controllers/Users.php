<?php 
    class Users extends Controller{
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register() {
            // Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //process form

                // Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'password_err' => '',
                    'confirm_password_err'
                ];

                if(empty($data['name'])) {
                    $data['name_err'] = 'You need to enter a name !';
                } else {    
                    if($this->userModel->findUserByName($data['name'])) {
                        $data['name_err'] = 'Name already taken !';
                    }
                }

                if(empty($data['password'])) {
                    $data['password_err'] = 'You need to put a password !';
                }

                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'You need to confirm password !';
                } else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords to not match !';
                    }
                }

                // Errors are empty
                if(empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated 
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    
                    if($this->userModel->register($data)) {
                        redirect('users/login'); 
                    } else {
                        die('Something went wrong ! ');
                    }

                } else {
                    $this->view('users/register', $data);
                }

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
                $this->view('users/register', $data);
            }
        }

        public function login() {
            // Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'name_err' => '',
                    'password_err' => ''
                ];

                if(empty($data['name'])) {
                    $data['name_err'] = 'You need to enter a name !';
                }        

                if(empty($data['password'])) {
                    $data['password_err'] = 'You need to put a password !';
                    http_response_code(404);
                }

                if($this->userModel->findUserByName($data['name'])) {
                    // User found
                } else {
                    $data['name_err'] = 'No user found !';
                }


                // Errors are empty
                if(empty($data['name_err']) && empty($data['password_err'])) {
                    // Validated 
                    // Check and set logged user
                    $loggedInUser = $this->userModel->login($data['name'], $data['password']);

                    if($loggedInUser) {
                        // Create session variables
                        die('Succes');
                    } else {
                        $data['password_err'] = 'Password incorrect !';
                        $this->view('users/login', $data);
                    }

                } else {
                    $this->view('users/login', $data);
                }

            } else {
                // init data
                $data = [
                    'name' => '', 
                    'password' => '',
                    'name_err' => '',
                    'password_err' => '',
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }
        
    }   