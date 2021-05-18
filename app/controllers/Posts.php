<?php
    class Posts extends Controller {

        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        public function index() {
            $posts = $this->postModel->getPosts();
            
            $cols = [
                "eventid,",
                "iyear,",
                "imonth"
            ];
            $stmt = $this->postModel->getColumnsData($cols);
            
            $data = [
                'posts' => $posts,
                'stmt' => $stmt
            ];

            $this->view('posts/index', $data);
        }
    }
