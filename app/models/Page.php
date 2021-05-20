<?php 
    class Page {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getColumn($column) {
            $query = "SELECT " . $column . " FROM terrorism";
            $this->db->query($query);
            $result = $this->db->resultSet();

            return json_encode($result);
        }

    }