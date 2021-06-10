<?php include '../php_scripts/login_redirect.php'; session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT ?>/css/admin_style.css">
    <title>Document</title>
</head>

<body>
    <div class="mainframe">
        <div class="header">
        <img src="<?php echo URL_ROOT; ?>/images/admin.png" width="100" height="100">
            <input class="right headerInput" type="submit" value="submit">
            <input class="right headerInput" type="search" name="mainsearch" id="mainsearch" placeholder="Search faster">
        </div>

        <?php include APP_ROOT . '/views/inc/admin_navbar.php' ?>
        <?php include APP_ROOT . '/views/inc/admin_sidebar.php' ?>

        <div class="main">
            <div class="adder">
                <form>
                    <label for="name">Name: </label><input type="text" name="username" placeholder="<?php echo $_SESSION['username']; ?>" disabled><br><br>
                    <label for="password">Password: </label><input type="text" name="password" placeholder="<?php echo $_SESSION['password']; ?>" disabled> <br><br>
                </form>
            </div>
        </div>

    </div>
</body> 
</html> 