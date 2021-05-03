<?php
    session_start();
    $loginPage = '../admin/admin.php';
    $homePage = '../index.html';
    
    if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == false) {
        header("Location: $homePage");
    } 
?>