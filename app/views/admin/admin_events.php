<?php include '../php_scripts/login_redirect.php' ?>
<?php 
    session_start();
    if(isset($_SESSION['attacks'])) {
        // print_r($_SESSION['attacks']);
        $attacks = $_SESSION['attacks'];   
    }

    if(!isset($_SESSION['leftLimit'])) $_SESSION['leftLimit'] = 1;
    if(!isset($_SESSION['step'])) $_SESSION['step'] = 5;
    if(!isset($_SESSION['rightLimit'])) $_SESSION['rightLimit'] = $_SESSION['leftLimit'] + $_SESSION['step'];
    if(!isset($_SESSION['page'])) $_SESSION['page'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT ?>/css/admin_style.css">
    <script src = "<?php echo URL_ROOT; ?>/javascript/admin/seeArticles.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="mainframe">
        <div class="header">
        <img src="<?php echo URL_ROOT; ?>/images/admin.png" width="100px" height="100px">
            <input class="right headerInput" type="submit" value="Submit" id="searchSubmit">
            <input class="right headerInput" type="search" name="mainsearch" id="mainsearch" placeholder="Search faster">
        </div>

        <?php include APP_ROOT . '/views/inc/admin_navbar.php' ?>
        <?php include APP_ROOT . '/views/inc/admin_sidebar.php' ?>

        <div class="main">
            <div class="adder">

                    <?php 
                        if(isset($_POST['lbtn'])) {
                            if($_SESSION['page'] > 1)
                                $_SESSION['page'] = $_SESSION['page'] - 1; 
                        }

                        if(isset($_POST['rbtn'])) {
                            $_SESSION['page'] = $_SESSION['page'] + 1;
                        }
                    ?>

                    <form method="POST">
                        <button id="lbutton" name="lbtn" onclick="goLeft(<?php echo $_SESSION['page']; ?>)">Previous</button>
                        <button id="rbutton" name="rbtn" onclick="goRight(<?php echo $_SESSION['page']; ?>)">Next</button>
                    </form><br><br>
                    

                    <table class="tablemain">
                    Page : <?php echo $_SESSION['page']; ?>
                        <?php foreach($attacks as $attack) : ?>
                            <tr>
                                <th>Id</th>
                                <th>Y</th>
                                <th>M</th>
                                <th>D</th>
                                <th>Country</th>
                                <th>Region</th>
                                <th>Provstate</th>
                            </tr>

                            <tr>
                                <td><?php echo $attack['id']?> </td>
                                <td><?php echo $attack['iyear']?> </td>
                                <td><?php echo $attack['imonth']?> </td>
                                <td><?php echo $attack['iday']?> </td>
                                <td><?php echo $attack['country_txt']?> </td>
                                <td><?php echo $attack['provstate']?> </td>
                            </tr>

                            <tr>
                                <th>City</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Summary</th>
                                <th>Type</th>
                                <th>Target</th>
                            </tr>

                            <tr>
                            <td><?php echo $attack['city']?> </td>
                            <td><?php echo $attack['latitude']?> </td>
                            <td><?php echo $attack['longitude']?> </td>
                            <td><?php echo $attack['summary']?> </td>
                            <td><?php echo $attack['attacktype1_txt']?> </td>
                            <td><?php echo $attack['target']?> </td>
                            </tr>

                            <tr><th><th></th></th></tr>
                        <?php endforeach; ?>
                    </table>

            </div>
        </div>
    </div>
            
</body> 
</html>