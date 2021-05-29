<?php
    class Posts extends Controller {

        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        public function index() {
            $posts = $this->postModel->getPosts();
            
            $data = [
                'posts' => $posts
            ];

            $this->view('posts/index', $data);       
        }

        public function regions() {
            if($_SERVER['REQUEST_METHOD'] == 'GET') { 
                $posts = $this->postModel->getRegions();
            
                $data = [
                    'posts' => $posts
                ];
            } 

            $this->view('posts/regions', $data);
        }
        public function columns() {
            if($_SERVER['REQUEST_METHOD'] == 'GET') { 
                $col = isset($_GET['col']) ? $_GET['col'] : die();
                $posts = $this->postModel->getColumn($col);
            
                $data = [
                'posts' => $posts
                ];
            }

            $this->view('posts/columns', $data);
        }
        public function data() {
            if($_SERVER['REQUEST_METHOD'] == 'GET') { 
                $xaxis = isset($_GET['xaxis']) ? $_GET['xaxis'] : die();
                $yaxis = isset($_GET['yaxis']) ? $_GET['yaxis'] : die();
                $posts = $this->postModel->getData($xaxis,$yaxis);
            
                $data = [
                    'posts' => $posts
                ];
            } 

            $this->view('posts/data', $data);
        }
    }
