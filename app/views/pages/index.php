<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style-home.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title><?php echo SITE_NAME; ?></title>
</head>

<header>
    <?php include APP_ROOT . '/views/inc/navbar.php'; ?>
</header>   

<body>

    <div class="container">
        <div class="wrapper">
            <div class="content">
                <h1>Articles</h1>
                <div class="items">
                    <div class="item">
                        <div class="item-picture" style="background-image:url(<?php echo URL_ROOT; ?>/images/image1.jpg)">
                            
                        </div>
                        <div class="item-text">
                            <h3>Sweden: Terrorism eyed after ax attack injures 8</h3>
                            A man armed with an ax attacked and injured eight people in a southern Swedish town Wednesday before being shot and arrested, police said.<br><br>
                            Link for further information: 
                            <a href="<?php echo URL_ROOT; ?>/pages/details">details</a>
                            <p><strong>Published</strong> 10.04.2021</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-picture" style="background-image:url(<?php echo URL_ROOT; ?>/images/image2.jpg)">
                            
                        </div>
                        <div class="item-text">
                            <h3>New York City subway bomber should get life sentence, prosecutors say</h3>
                            A Bangladeshi immigrant who set off a pipe bomb attached to his chest in New York City’s busiest subway station should spend the rest of his life behind bars for a "premeditated and vicious" terror attack. <br><br>
                            Link for further information: 
                            <a href="<?php echo URL_ROOT; ?>/pages/details">details</a>
                            <p><strong>Published</strong> 09.04.2021</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-picture" style="background-image:url(<?php echo URL_ROOT; ?>/images/image3.png)">
                            
                        </div>
                        <div class="item-text">
                            <h3>10 of Britain’s most dangerous convicted terrorists seeking early release through parole</h3>
                            Ten of Britain’s most dangerous convicted terrorists are bidding for early release through parole, according to reports.<br><br>
                            Link for further information: 
                            <a href="<?php echo URL_ROOT; ?>/pages/details">details</a>
                            <p><strong>Published</strong> 08.04.2021</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="side">
                <div class="side-text">
                    <h3>Safety Tips</h3>
                    <ul>
                        <li>Remain calm and be patient</li>
                        <li>Follow the advice of local emergency officials</li>
                        <li>Listen to your radio or television for news and instructions</li>
                        <li>If the event occurs near you, check for injuries. Give first aid and get help for seriously injured people</li>
                        <li>Call your family contact—do not use the telephone again unless it is a life-threatening emergency.</li>
                    </ul>
                </div>
                <div class="side-image" style="background-image: url(<?php echo URL_ROOT; ?>/images/stop.jpg);">
                    
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
