<?php
    class Pages extends Controller {

        public function __construct() {
            $this->userModel = $this->model('Page');
        } 

        public function index() {
            $data = [
                'title' => 'Index page'
            ];
            $this->view('pages/index', $data);
        }

        public function attackPageTemplate() {
            $data = [
                'title' => 'attackPageTemplate'
            ];
            $this->view('pages/attackPageTemplate', $data);
        }

        public function details() {
            $data = [
                'title' => 'details'
            ];
            $this->view('pages/details', $data);
        }

        public function map() {
            $data = [
                'title' => 'map'
            ];
            $this->view('pages/map', $data);
        }

        public function statistics() {
            $data['title'] = 'statistics';
            $data['json_values'] = '';

            if($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data['json_values'] = '';               
                $data['json_values'] = $this->userModel->getColumn($_GET['column']);
                $this->view('pages/statistics', $data);
            } else {
                $this->view('pages/statistics', $data);
            }
            
        }

        public function raport() {
            $data = [
                'title' => 'raport'
            ];
            $this->view('pages/raport', $data);
        }

    }
?>