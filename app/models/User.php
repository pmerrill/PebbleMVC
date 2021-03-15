<?php
    class User {
        private $db;

        public function __construct(){
            // Initialize the database with the PDO class we created
            $this->db = new Database;
        }

        // Used to check if an email is already in use
        public function findUserByEmail($email){
            // Query that selects any users with the
            // same email as the one passed in
            $this->db->query('SELECT id FROM users WHERE email = :email LIMIT 1');

            // Bind the value to the query
            $this->db->bind(':email', $email);

            // Get the first row that contains the email
            $row = $this->db->single();

            // If there is a user with the email return true
            return $this->db->rowCount() > 0 ? true : false;
        }

        // Insert a new user into the database
        public function userRegister($name, $email, $password){
            // Query that inserts the new user
            $this->db->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)');

            // Bind the value to the query
            $this->db->bind(':name', $name);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $password);

            // Execute and insert the user
            $row = $this->db->execute();

            // Success
            return true;
        }
    }