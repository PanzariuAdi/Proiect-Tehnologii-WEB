<?php
session_start();
header('Content-type: application/json');
$json = file_get_contents('php://input');
$json_decode = json_decode($json, true); 
$json_encode = json_encode($json_decode);
// echo $json_encode;
$_SESSION['attacks'] = $json_decode;