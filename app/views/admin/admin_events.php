<?php include '../php_scripts/login_redirect.php' ?>
<?php 
    session_start();
    if(isset($_SESSION['attacks'])) {
        // print_r($_SESSION['attacks']);
        $attacks = $_SESSION['attacks'];
    }
?>

<script>
    loadAttacks = async () => {
        try {   
            var res = [];
            var query = 
                `query {
                    attacks {
                        eventid
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

    var myPromise = loadAttacks().then(function(result) {
        var jsondata;
        var data = JSON.stringify(result);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/proiect-mvc/admin/attacks_redirect", !0);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(data);
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                jsondata = JSON.parse(xhr.responseText);
                console.log(jsondata);
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
    <script src = "<?php echo URL_ROOT; ?>/javascript/admin.js"></script>
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

                <select name="allOrOne" id="selectView" onchange="showDiv('hiddenDiv', this)">
                    <option value="1">See all events</option>
                    <option value="2">See one event by ID</option>
                </select><br><br>
                
                <div id="hiddenDiv2">
                    <select name="order" id="orderSelect">
                        <option value="1">Order by ID</option>
                        <option value="2">Order by date</option>                  
                        <option value="3">Order by location</option>
                    </select><br><br>
                </div>

                <div id="hiddenDiv" style = "display: none";>
                    <form action="">    
                        <input type="text" name="eventid" id="hiddenInput" placeholder="Type an id"><br><br>
                        <input type="submit" value="Submit" onclick="showEvent(eventid)">
                    </form>
                </div>



                <!-- <table class="tablemain">
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

                </table> -->
            </div>
        </div>
    </div>
            
</body> 
</html>