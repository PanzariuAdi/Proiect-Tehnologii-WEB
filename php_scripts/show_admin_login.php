<?php
    session_start();
    if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == false)
        echo '<li><a href="login.html" style="float:right;">Login</a></li>';
    else
        echo '<li><a href="./admin/admin.php" style="float:right;">Admin dashboard</a></li>';
?>
            