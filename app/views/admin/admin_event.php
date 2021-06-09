<?php include '../php_scripts/login_redirect.php' ?>
<?php 
    session_start();
    if(isset($_SESSION['attacks'])) {
        print_r($_SESSION['attacks']);
        $attacks = $_SESSION['attacks'];   
    }
?>

<script>
    loadAttack = async (id) => {
        try {   
            var res = [];
            var query = 
                `query {
                    attackById (id: ${id}){
                        id
                        iyear
                        imonth
                        iday
                        country_txt
                        region_txt
                        provstate
                        city
                        latitude
                        longitude
                        summary
                        attacktype1_txt
                        targtype1_txt
                        target
                        weaptype1_txt
                    }
                }`;

            await fetch('http://localhost:4000/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({query})
            }).then (r => r.json())
            .then (data => res = data.data.attacks)
            
            return res;
        } catch(err) {
            console.log(err);
        }
    }   

        var myPromise = loadAttack(2).then(function(result) {
            var jsondata;
            var data = JSON.stringify(result);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "http://localhost/proiect-mvc/admin/attacks_redirect", !0);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.send(data);
            
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    jsondata = JSON.parse(xhr.responseText);
                    // console.log(jsondata);
                }
            }
        })

</script>

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
            <!-- <div class="adder">
                <form action="">
                
                </form>

            </div> -->

        </div>
    </div>
            
</body> 
</html>