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

        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../index.php" style="float:right;">Logout</a></li>
                <li><a href="admin_myaccount.php" style="float: right;">My account</a></li>
            </ul>
        </nav>

        <div class="sidebar">
            <h1>Database</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="<?php echo URL_ROOT; ?>/admin/add_event">Add event</a></li>
                    <li><a href="<?php echo URL_ROOT; ?>/admin/update_event">Update event</a></li>
                    <li><a href="<?php echo URL_ROOT; ?>/admin/delete_event">Delete event</a></li>    
                    <li><a href="<?php echo URL_ROOT; ?>/admin/see_events">See events</a></li>
                </ul>
            </div>

            <h1>Users and access</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="<?php echo URL_ROOT; ?>/admin" style="color: crimson;">Admin home page</a></li>
                    <li><a href="<?php echo URL_ROOT; ?>/admin/manage">Manage access</a></li>
                </ul>
            </div>

            <h1>Informations about data</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="countries.php">Countries ID</a></li>
                    <li><a href="targsubtype.php">Targ subtype ID</a></li>
                </ul>
            </div>

            <h1>Articles</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="<?php echo URL_ROOT; ?>/admin/add_article">Add article</a></li>
                    <li><a href="<?php echo URL_ROOT; ?>/admin/update_article">Update article</a></li>
                    <li><a href="<?php echo URL_ROOT; ?>/admin/delete_article">Delete article</a></li>
                    <li><a href="<?php echo URL_ROOT; ?>/admin/see_articles">See all articles</a></li>
                </ul>
            </div>
        </div>

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