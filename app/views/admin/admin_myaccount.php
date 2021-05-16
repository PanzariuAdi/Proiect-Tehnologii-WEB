<?php include '../php_scripts/login_redirect.php' ?>

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
        <img src="<?php echo URL_ROOT; ?>/images/admin.png" width="100px" height="100px">
            <input class="right headerInput" type="submit" value="submit">
            <input class="right headerInput" type="search" name="mainsearch" id="mainsearch" placeholder="Search faster">
        </div>

        <?php include APP_ROOT . '/views/inc/admin_navbar.php' ?>
        <?php include APP_ROOT . '/views/inc/admin_sidebar.php' ?>

        <div class="main">
            <div class="adder">
                <h4>Panzariu Ionut - Adrian</h4>
                <h4>panzariu.adi00@gmail.com</h4>
                <h4>0735266148</h4>
                <form action="">
                    <label for="changePassword">Current password</label> <input type="password" name="password" id=""><br><br>
                    <label for="changePassword">New password</label> <input type="password" name="newpassword" id=""><br><br>
                    <input type="submit" value="Change password">
                </form>
            </div>
        </div>

    </div>
</body> 
</html>