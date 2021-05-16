<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/login_style.css">
    <title>Document</title>
</head>
<div class="mainframe">
        <body>
        <form action="./php_scripts/login.php" method="POST">
            <h1>Login</h1>
            <label for="username">Username</label><br><br>
            <input type="text" name="username"><br><br>

            <label for="password">Password</label><br><br>
            <input type="password" name="password"><br><br>

            <input type="submit" name="submit"> <br>
            <input type="submit" name="register" value="Register" id="btn_register">
            <!-- <input type="submit" name="gohome" value="Home"><br><br> -->
        </form>
    </div>
</body>
</html>