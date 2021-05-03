<?php
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

    $adminPage = "../admin/admin.php";

    if($username == "admin" && $password == "admin") {
        $_SESSION["connected"] = true;
        header("Location: $adminPage");
    } else {
        $_SESSION["connected"] = false;
        header("Location: ../index.html");
    }
    
?>  