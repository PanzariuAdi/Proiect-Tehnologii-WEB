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
            <div class="adder">
                <form action="">
                    <label for="selectUser">Select user: </label><select name="userselect" id="">
                        <option value="1">User 1</option>
                        <option value="2">User 2</option>
                    </select><br><br>

                    <label for="email">Email: </label><input type="email" name="email" placeholder="panzariu.adi00@gmail.com"><br><br>
                    <label for="password">Password: </label><input type="text" name="password" placeholder="Hashed password" active="false"><br><br>
                    <label for="rights">Add to database: </label><input type="checkbox" name="add_right"> <br><br>
                    <label for="rights">Update the database: </label><input type="checkbox" name="update_right"> <br><br>
                    <label for="rights">Delete from database: </label><input type="checkbox" name="delete_right"> <br><br>

                    <input type="submit" value="Modify user">
                </form>
            </div>
        </div>

    </div>
</body> 
</html> 