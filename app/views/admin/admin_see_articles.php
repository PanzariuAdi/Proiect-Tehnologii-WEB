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
                <select name="order" id="">
                    <option value="1">Order by ID</option>
                    <option value="2">Order by date</option>                  
                    <option value="3">Order alphabetical</option>
                    
                </select><br><br>

                <select name="" id="">
                    <option value="1">See all articles</option>
                    <option value="2">See one article on ID</option>
                </select><br><br>

                <table class="tablemain full">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Tags</th>
                    </tr>

                    <tr>
                        <td>0</td>
                        <td>Afghanistan war</td>
                        <td>01.01.2021</td>
                        <td>#afghanistan #war #ak47</td>
                    </tr>

                <table class="tablemain">
                    <tr>
                        <th>ID</th>
                        <td>0</td>
                    </tr>

                    <tr>
                        <th>Date</th>
                        <td>1970/07/02</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>Karl Armstrong, a member of the New Years Gang, broke into the University of Wisconsin's Primate 
                            Lab and set a fire on the first floor of the building.  Armstrong intended to set fire to the Madison, 
                            Wisconsin, United States, Selective Service Headquarters 
                        </td>
                    </tr>

                    <tr>
                        <th>Tags</th>
                        <td>#afghanistan #war #ak47</td>
                    </tr>

                </table>
            </div>
        </div>

    </div>
</body> 
</html>