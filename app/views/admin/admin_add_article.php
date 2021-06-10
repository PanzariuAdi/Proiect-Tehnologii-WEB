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
        <img src="<?php echo URL_ROOT; ?>/images/admin.png" width="100" height="100">
            <input class="right headerInput" type="submit" value="submit">
            <input class="right headerInput" type="search" name="mainsearch" id="mainsearch" placeholder="Search faster">
        </div>

        <?php include APP_ROOT . '/views/inc/admin_navbar.php' ?>
        <?php include APP_ROOT . '/views/inc/admin_sidebar.php' ?>

        <div class="main">

            <!-- This is for adding a row to DB -->
            <div class="adder"> 
                <form action="<?php echo URL_ROOT; ?>/admin/add_article" method="POST">
                    <label for="title">Title: </label> <input type="text" name="title_article" id="title_article"><br><br>
                    <label for="description">Description: </label> <textarea name="description" id="description" cols="30" rows="10"></textarea><br><br>
                    <input type="submit" value="Add article">
                </form>
            </div>
        </div>

    </div>
</body> 
</html>