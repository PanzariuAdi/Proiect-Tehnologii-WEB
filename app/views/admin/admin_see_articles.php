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