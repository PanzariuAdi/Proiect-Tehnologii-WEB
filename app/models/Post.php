<?php
    class Post {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT DISTINCT country_txt FROM terrorism");
            $result = $this->db->resultSet();

            return json_encode($result);
        }

        public function getRegions() {
            $this->db->query("SELECT DISTINCT region_txt FROM terrorism");
            $result = $this->db->resultSet();

            return json_encode($result);

        }

    }