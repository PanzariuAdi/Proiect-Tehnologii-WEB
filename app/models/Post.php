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
            switch($yaxis){
                case 'Attacks':
                    $query = "SELECT DISTINCT ".$xaxis." as field, count(*) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' group by ".$xaxis."  order by count(*) desc ";
                    break; 
                case 'Casualities':
                    $query = "SELECT DISTINCT ".$xaxis." as field, SUM(nkill) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' group by ".$xaxis."  order by SUM(nkill) desc ";
                    break;         
                case 'Successful-attacks':
                    $query = "SELECT DISTINCT ".$xaxis." as field, count(*) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' and success=1 group by ".$xaxis.",success order by count(*) desc ";
                    break;    
                case 'Failed-attacks':
                    $query = "SELECT DISTINCT ".$xaxis." as field, count(*) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' and success = 0 group by ".$xaxis.",success  order by count(*) desc ";
                    break;     
                case 'Suicides':
                    $query = "SELECT DISTINCT ".$xaxis." as field, count(*) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' and suicide = 1 group by ".$xaxis.",suicide  order by count(*) desc ";
                    break;
                case 'Wounded':
                    $query = "SELECT DISTINCT ".$xaxis." as field, SUM(nwound) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' group by ".$xaxis."  order by SUM(nwound) desc ";  
                    break;
                case 'Loss-value':
                    $query = "SELECT DISTINCT ".$xaxis." as field, SUM(propvalue) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' group by ".$xaxis."  order by SUM(propvalue) desc ";
                    break;
                case 'Ransom':
                    $query = "SELECT DISTINCT ".$xaxis." as field, count(*) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' and ransom = 1 group by ".$xaxis.",ransom  order by count(*) desc ";
                    break;
                case 'Ransom-Ammount'   :      
                    $query = "SELECT DISTINCT ".$xaxis." as field, SUM(ransomamt) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' group by ".$xaxis."  order by SUM(ransomamt) desc ";
                    break;
                case 'Extended':
                    $query = "SELECT DISTINCT ".$xaxis." as field, count(*) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' and extended=1 group by ".$xaxis.",extended order by count(*) desc ";
                    break;
                case 'Not-Extended':
                    $query = "SELECT DISTINCT ".$xaxis." as field, count(*) as value FROM terrorism WHERE lower(".$xaxis.") not like '%unknown%' and ".$xaxis." not like '' and extended=0 group by ".$xaxis.",extended order by count(*) desc ";
                    break;
                case 'Terrorists' :
                    break;                          
            }
            $this->db->query($query);
            $result = $this->db->resultSet();
            return json_encode($result);
        }

    }