<?php include '../php_scripts/login_redirect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT ?>/css/admin_style.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT ?>/css/attackdetail.css">
    <script src = "<?php echo URL_ROOT; ?>/javascript/admin/seeAttacks.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="mainframe">
        <div class="header">
        <img src="<?php echo URL_ROOT; ?>/images/admin.png" width="100" height="100">
            <input class="right headerInput" type="submit" value="Submit" id="searchSubmit">
            <input class="right headerInput" type="search" name="mainsearch" id="mainsearch" placeholder="Search faster">
        </div>

        <?php include APP_ROOT . '/views/inc/admin_navbar.php' ?>
        <?php include APP_ROOT . '/views/inc/admin_sidebar.php' ?>
        <div class="main">
            <div class="adder">
                    <div>
                        <input type="button" value="Previous" id="btnPrev">
                        <input type="button" value="Next" id="btnNext">
                    </div>

                    <div id="data"></div>
            </div>
        </div>
    </div>
            
</body> 
</html>