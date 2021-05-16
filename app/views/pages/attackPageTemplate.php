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
                    <p class="description">Acesta este un calendar</p>
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
                        <p class="description">Descrierea armelor</p>
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
                        <p class="description">Descrierea locatiei</p>
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
                        <p class="description">Sumarul atacului</p>
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
                        <p class="description">Tinta atacului</p>
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