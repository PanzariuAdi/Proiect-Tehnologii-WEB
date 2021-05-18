<?php 
    class User {
        private $db;
         
        public function __construct(){
            $this->db = new Database();
        }

        // Register user
        public function register($data) {
            $this->db->query('INSERT INTO users (name, password) VALUES(:name, :password)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':password', $data['password']);
            
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Login user
        public function login($name, $password) {
            $this->db->query('SELECT * FROM users WHERE name = :name');
            $this->db->bind(':name', $name);

            $row = $this->db->single();
            $hashed_password = $row->password;

            if(password_verify($password, $hashed_password)) {
                return $row;
            }
            return false;
        }

        // Find user by name
        public function findUserByName($name) {
            $this->db->query('SELECT * FROM users WHERE name = :name');
            $this->db->bind(':name', $name);

            $row = $this->db->single();

            // Check if name exists
            if($this->db->rowCount() > 0) {
                return true;
            } 
            
            return false;
            
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM terrorism");
            // return $this->db->resultSet();
            return json_encode($this->db->resultSet());
        }
    }
?>