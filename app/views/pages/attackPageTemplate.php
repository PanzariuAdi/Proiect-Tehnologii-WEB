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
    <nav>
        <ul>
            <li><a href="href="<?php echo URL_ROOT; ?>/pages"">Home</a></li>
            <li><a href="map.html">Maps</a></li>
            <li><a href="statistics.html">Statistics</a></li>
            <li><a href="raport.html">Raport</a></li>
            <!-- <li><a href="#" style="float:right;">Logout</a></li>
            <li><a href="#" style="float: right">My account</a></li>-->
            <li><a href="admin/admin.html" style="float:right;">Login</a></li>
            <li><a href="#" id="search-button" style="float: right">Submit</a></li>
            <li><form action="" style="float: right;"><input type="text" placeholder="Search.." id="search" > </li></form>
        </ul>
    </nav>
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