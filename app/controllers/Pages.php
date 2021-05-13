<?php
    class Pages extends Controller {

        public function __construct() { }

        public function index() {
            $this->view('pages/index');
        }

        public function attackPageTemplate() {
            $this->view('pages/attackPageTemplate');
        }

        public function details() {
            $this->view('pages/details');
        }
        public function statistics() {
            $this->view('pages/statistics');
        }
        
    }
?>