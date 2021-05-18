<?php
    class Post {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM terrorism");
            $result = $this->db->resultSet();
            return $result;
            // echo json_encode($this->db->resultSet());
        }   

        public function getColumnsData($columns) { 
            $stmt = "SELECT ";
            foreach($columns as $column) {
                $stmt = $stmt . $column;
            }
            $stmt = $stmt . ' FROM terrorism';
            $this->db->query($stmt);
            $result = $this->db->resultSet();
            return $result;
        }
    }