<?php
    class Post {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM terrorism WHERE country_txt = 'Romania'");
            return  $this->db->resultSet();
        }   
    }
?>