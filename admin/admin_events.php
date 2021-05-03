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
            <input class="right headerInput" type="submit" value="Submit" id="searchSubmit">
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
                    <li><a href="admin_events.php" style="color: crimson;">See events</a></li>
                </ul>
            </div>

            <h1>Users and access</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="admin.php">Admin home page</a></li>
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
            <div class="adder">
                <select name="order" id="">
                    <option value="1">Order by ID</option>
                    <option value="2">Order by date</option>                  
                    <option value="3">Order by location</option>
                    
                </select><br><br>

                <select name="" id="">
                    <option value="1">See all events</option>
                    <option value="2">See one event by ID</option>
                </select><br><br>

                <table class="tablemain">
                    <tr>
                        <th>ID</th>
                        <th>Location</th>
                        <th>Attack type</th>
                    </tr>

                    <tr>
                        <td>197000000001</td>
                        <td>Dominican Republic</td>
                        <td>Assassination</td>
                    </tr>
                    
                    <tr>
                        <td>197000000002</td>
                        <td>Mexico</td>
                        <td>Hostage taking</td>
                    </tr>
                </table>

                <table class="tablemain">
                    <tr>
                        <th>ID</th>
                        <td>197000000001</td>
                    </tr>

                    <tr>
                        <th>Date</th>
                        <td>1970/07/02</td>
                    </tr>

                    <tr>
                        <th>Location</th>    
                        <td>Dominican republic</td>
                    </tr>

                    <tr>
                        <th>Region</th>
                        <td>Central America and Carribean</td>
                    </tr>

                    <tr>
                        <th>Lattitude</th>
                        <td>18.456792</td>
                    </tr>

                    <tr>
                        <th>Longitude</th>
                        <td>-69.951164</td>
                    </tr>

                    <tr>
                        <th>Summary</th>
                        <td>Karl Armstrong, a member of the New Years Gang, broke into the University of Wisconsin's Primate 
                            Lab and set a fire on the first floor of the building.  Armstrong intended to set fire to the Madison, 
                            Wisconsin, United States, Selective Service Headquarters 
                        </td>
                    </tr>

                </table>
            </div>
        </div>

    </div>
</body> 
</html>