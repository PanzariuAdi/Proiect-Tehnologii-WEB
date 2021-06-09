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
            $this->view('pages/statistics', $data);
        }

        public function raport() {
            $data = [
                'title' => 'raport'
            ];
            $this->view('pages/raport', $data);
        }
        public function advancedSearch() {
            $data = [
                'title' => 'Advanced_Search'
            ];
            $this->view('pages/advancedSearch', $data);
        }
        public function attack_redirect() {
            $this->view('pages/attack_redirect');
        }

    }
?>