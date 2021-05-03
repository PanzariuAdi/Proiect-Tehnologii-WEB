<?php include '../php_scripts/login_redirect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="mainframe">
        <div class="header">
            <img src="./resources/admin.png" width="100px" height="100px">
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
                    <li><a href="admin_add.php">Add event</a></li>
                    <li><a href="admin_update.php">Update event</a></li>
                    <li><a href="admin_delete.php">Delete event</a></li>    
                    <li><a href="admin_events.php">See events</a></li>
                </ul>
            </div>

            <h1>Users and access</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="admin.php" style="color: crimson;">Admin home page</a></li>
                    <li><a href="admin_manage.php">Manage access</a></li>
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
                    <li><a href="admin_add_article.php">Add article</a></li>
                    <li><a href="admin_update_article.php">Update article</a></li>
                    <li><a href="admin_delete_article.php">Delete article</a></li>
                    <li><a href="admin_see_articles.php">See all articles</a></li>
                </ul>
            </div>
        </div>

        <div class="main">
            <h1>Thanks for using our site !</h1>
            <h2>Guide to admin panel</h2>
            <p>1. Adding to the database.<br>
                If you want to add a new terrorist attack in the database, you have to go to the "Add event", located in the left part of the screen, and
                complete the form. Be careful at countries and targtype IDs, you need to check it in the "Informations about data".
            </p>

            <p>2. Update an event from your database.<br>
                If you want to update an event from your database, all you have to do is select its ID and change values in the form. When you are ready, just
                hit "Update event" button.
            </p>
    
            <p>3. Delete an event from database. <br>
                If you want to delete an event, just type its ID, and hit "Delete event" button. You cand see all events summaried in "See events" tag.
            </p>

        </div>

    </div>
</body> 
</html>