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
        public function getColumn($column) {
            $query = "SELECT DISTINCT " . $column . " as value FROM terrorism";
            $this->db->query($query);
            $result = $this->db->resultSet();
            return json_encode($result);
        }
        public function getData($xaxis,$yaxis){
            $query = "SELECT DISTINCT ".$xaxis." as field, count(*) as value FROM terrorism group by ".$xaxis." order by count(*) desc";
            $this->db->query($query);
            $result = $this->db->resultSet();
            return json_encode($result);
        }

    }