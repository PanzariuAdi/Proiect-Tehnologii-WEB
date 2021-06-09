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
                    <div id="calendarTXT">

                    </div>
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
                        <div id = "weaponsTXT">
                        </div>
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
                        <div id = "locationTXT">
                        </div>
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
                        <div id="summaryTXT">
                        </div>
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
                        <div id="targetTXT">
                        </div>
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
                    <div id="detailsTXT">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body> 
</html>

<script>
   const loadAttack = async(id) => {
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
                    target1
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
            .then (data => res = data.data.attackById[0])
            // .then(console.log)
            console.log(res);
            document.getElementById("calendarTXT").innerHTML = `Year : ${res.iyear}<br> 
                                                                Month : ${res.imonth} <br>
                                                                Day: ${res.iday} <br>`;

            if(res.weapdetail === "" || typeof res.weapdetail === 'undefined')
                res.weapdetail = "N/A";
            if(res.weapType1_txt === "" || typeof res.weapType1_txt === 'undefined')
                res.weapType1_txt = "N/A";
            document.getElementById("weaponsTXT").innerHTML = `${res.weapdetail+": " +res.weapType1_txt}`;

            document.getElementById("locationTXT").innerHTML = `The event happened in ${res.city}, ${res.provstate} in
                                                                ${res.region_txt}, ${res.country_txt}`;    
            if(res.summary === "" || typeof res.summary === 'undefined')
                res.summary = "N/A";            
            document.getElementById("summaryTXT").innerHTML = `${res.summary}`;   
            if(res.target1 === "" || typeof res.target1 === 'undefined')
                res.target1 = "N/A";
            document.getElementById("targetTXT").innerHTML = `The target was ${res.target1}`; 

            document.getElementById("detailsTXT").innerHTML = `success: ${res.success}<br>
                                                                suicide: ${res.suicide}<br>
                                                                Target type: ${res.targtype1_txt}`; 
        } catch(err) {
            console.log(err);
        }
    }
    var id = <?php if(isset($_GET['id'])) echo $_GET['id']; else echo 0; ?>;
    loadAttack(id);
</script>