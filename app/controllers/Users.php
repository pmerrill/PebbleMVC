<?php
    class Users extends Controller {

        // Validation params
        protected $minNameLength = 4;
        protected $minEmailLength = 6;
        protected $minPasswordLength = 6;
        
        public function __construct(){
            // Check the models folder for a file called User.php
            $this->userModel = $this->model('User');
        }

        // Handle loading register form
        // and form submission
        public function register(){

            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the form

                // Sanitize POST data
                 // We don't have to sanitize the data because we are using
                 // prepared statements. Sanitizing here is just an extra precaution.
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];

                // Validate name
                $data['name_error'] = empty($data['name']) ? 'Please enter your name.' : (strlen($data['name']) < $this->minNameLength ? 'Name must be at least ' . $this->minNameLength . ' characters.' : '');

                // Validate email
                $data['email_error'] = empty($data['email']) ? 'Please enter your email.' : (strlen($data['email']) < $this->minEmailLength ? 'Email must be at least ' . $this->minEmailLength . ' characters.' : '');
                
                // Check if the email is already in use
                 // findUserByEmail will return true
                 // if the email is already in use
                $data['email_error'] = empty($data['email_error']) ? ($this->userModel->findUserByEmail($data['email']) ? 'Email is already taken.' : '') : $data['email_error'];

                // Validate password
                $data['password_error'] = empty($data['password']) ? 'Please enter a password.' : (strlen($data['password']) < $this->minPasswordLength ? 'Password must be at least ' . $this->minPasswordLength . ' characters.' : '');
                
                // Validate confirm password
                $data['confirm_password_error'] = empty($data['confirm_password']) ? 'Please confirm your password.' : (($data['password'] != $data['confirm_password']) ? 'Passwords do not match.' : '');
                
                // Check for errors before proceeding
                $hasError = !empty($data['name_error']);
                $hasError = !$hasError ? !empty($data['email_error']) : $hasError;
                $hasError = !$hasError ? !empty($data['password_error']) : $hasError;
                $hasError = !$hasError ? !empty($data['confirm_password_error']) : $hasError;

                // No errors were found
                if (!$hasError){

                    // Assign to a variable for readability
                    $name = $data['name'];
                    $email = $data['email'];
                    $password = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Insert the new user into the database
                    $this->userModel->userRegister($name, $email, $password);

                    // User was registered
                    // Take them to the log in page
                     // It would be better to log the user
                     // in automatically.
                    $this->view('users/login', $data);
                } else {
                    // Load view with errors
                    $this->view('users/register', $data);
                }
            } else {
                // Init data
                 // Used to capture/handle user input
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];

                // Load view
                $this->view('users/register', $data);
            }
        }

        // Handle loading register form
        // and form submission
        public function login(){

            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the form

                // Sanitize POST data
                 // We don't have to sanitize the data because we are using
                 // prepared statements. Sanitizing here is just an extra precaution.
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_error' => '',
                    'password_error' => ''
                ];

                // Validate email
                $data['email_error'] = empty($data['email']) ? 'Please enter your email.' : (strlen($data['email']) < $this->minEmailLength ? 'Email must be at least ' . $this->minEmailLength . ' characters.' : '');

                // Validate password
                $data['password_error'] = empty($data['password']) ? 'Please enter a password.' : (strlen($data['password']) < $this->minPasswordLength ? 'Password must be at least ' . $this->minPasswordLength . ' characters.' : '');
                
                // Check for errors before proceeding
                $hasError = !empty($data['email_error']);
                $hasError = !$hasError ? !empty($data['password_error']) : $hasError;

                // No errors were found
                if (!$hasError){
                    die('Success.');
                } else {
                    // Load view with errors
                    $this->view('users/login', $data);
                }
            } else {
                // Init data
                 // Used to capture/handle user input
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => '',
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }
    }