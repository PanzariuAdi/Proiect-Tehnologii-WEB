<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/attackPageStyle.css">
    <title>Document</title>
</head>
<header>
    <?php include APP_ROOT . '/views/inc/navbar.php'; ?>
</header>   

<script>
    loadAttack = async(id) => {
        try {
            var res = [];
            var query = `
            query {
                attackById(id: ${id}) {
                    id
                    iyear
                    imonth
                    iday
                    extended
                    country_txt
                    region_txt
                    provstate
                    city
                    latitude
                    longitude
                    specificity
                    vicinity
                    summary
                    multiple
                    success
                    suicide
                    attacktype1_txt
                    targtype1_txt
                    corp
                    target
                    natlty1_txt
                    gname
                    motive
                    claimed
                    weaptype1_txt
                    weapdetail
                    nkill
                    nkillus
                    nkillter
                    nwounds
                    ishostkid
                    addnotes
                    propextent_txt
                }
            }
            `;

            await fetch('http://localhost:4000/', {
                method: 'POST', 
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({query})
            }).then (r => r.json())
            .then (data => res = data.data.attackById)
            // .then(console.log)
            
            return res;
        } catch(err) {
            console.log(err);
        }
    }

    var id = <?php if(isset($_GET['id'])) echo $_GET['id']; else echo 0; ?>;

    if(id != 0) { 
        var myPromise = loadAttack(id).then(function(result) {
            var jsondata;
            var data = JSON.stringify(result);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "http://localhost/proiect-mvc/pages/attack_redirect", !0);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.send(data);
            
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // jsondata = JSON.parse(xhr.responseText);
                    jsondata = xhr.responseText;
                    console.log(jsondata);
                }
            }
        })
    }
</script>

<?php 
    session_start();
    $event = "";
        if(isset($_SESSION['attack'])) {
            $event = $_SESSION['attack'][0];
            //print_r($event);
        }
    if(empty($event)) {
        echo "Id invalid !";
    }
?>


<body>
    <div class="grid">
        <div class="map">
            <img class="image" src="<?php echo URL_ROOT; ?>/images/map.png">
        </div>
        <div class="date">
            <div class="imageContainer">
                <img class= "image" src="<?php echo URL_ROOT; ?>/images/calendar.jpg" alt="calendar">
                <div class="overlay">
                    <div class="title">
                            Calendar
                    </div><br>
                    <p class="description">
                        Year : <?php echo $event['iyear']; ?><br> 
                        Month : <?php echo $event['imonth']; ?> <br>
                        Day: <?php echo $event['iday']; ?> <br>
                    </p>
                </div>
            </div>
            
        </div>
        <div class="weapons">
                <div class="imageContainer">
                    <img class= "image" src="<?php echo URL_ROOT; ?>/images/weapons.jpg" alt="weapons">
                    <div class="overlay">
                        <div class="title">
                                Weapons
                        </div><br>
                        <p class="description">
                            <?php 
                                if(empty($event['weaptype1_txt']))
                                    echo "Necunoscut";
                                else
                                    echo $event['weaptype1_txt'] . " " . $event['weapdetail'];
                            ?>
                        </p>
                    </div>
                </div>  
        </div>
        <div class="location">
                <div class="imageContainer">
                    <img class= "image" src="<?php echo URL_ROOT; ?>/images/location.jpg" alt="location">
                    <div class="overlay">
                        <div class="title">
                                Location
                        </div><br>
                        <p class="description">
                            The event happened in <?php echo $event['city'] . ", " . $event['provstate'] . " in " . 
                            $event['region_txt'] . ", " . $event['country_txt']; ?>

                        </p>
                    </div>
                </div>
        </div>
        <div class="summary">
                <div class="imageContainer">
                    <img class= "image" src="<?php echo URL_ROOT; ?>/images/summary.png" alt="summary">
                    <div class="overlay">
                        <div class="title">
                                Summary
                        </div><br>
                        <p class="description">
                            <?php 
                            if(empty($event['summary']))
                                echo "Necunoscut";
                            else
                                echo $event['summary']; 
                            ?>
                        </p>
                    </div>
                </div>
                
            </div>

        <div class="target">
                <div class="imageContainer">
                    <img class= "image" src="<?php echo URL_ROOT; ?>/images/target.jpg" alt="target">
                    <div class="overlay">
                        <div class="title">
                                Target
                        </div><br>
                        <p class="description"><?php
                            if(empty($event['target1']))  echo "Necunoscut";
                            else echo "Tinta atacului a fost " . $event['target1'];
                        ?></p>
                    </div>
                </div>
                
        </div>
        
        <div class="attackdetails">
            <div class="imageContainer">
                <img class= "image" src="<?php echo URL_ROOT; ?>/images/details.png" alt="details">
                <div class="overlay">
                    <div class="title">
                            Attack Details
                    </div><br>
                    <p class="description">Detaliile atacului</p>
                </div>
            </div>
        </div>
    </div>
</body> 
</html>