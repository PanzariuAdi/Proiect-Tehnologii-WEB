<?php 
    class Admin extends Controller {
        public function __construct() { }

        public function index() {
            $this->view('admin/admin');
        }

        public function add_event() {
            $this->view('admin/admin_add');
        }

        public function delete_event() {
            $this->view('admin/admin_delete');
        }

        public function update_event() {
            $this->view('admin/admin_update');
        }

        public function add_article() {
            $this->view('admin/admin_add_article');
        }

        public function update_article() {
            $this->view('admin/admin_update_article');
        }

        public function delete_article() {
            $this->view('admin/admin_delete_article');
        }

        public function manage() {
            $this->view('admin/admin_manage');
        }

        public function myaccount() {
            $this->view('admin/admin_myaccount');
        }

        public function see_articles() {
            $this->view('admin/admin_see_articles');
        }

        public function see_events() {
            $this->view('admin/admin_events');
        }
    }
?>