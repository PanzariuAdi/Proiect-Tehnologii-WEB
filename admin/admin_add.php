<?php include '../php_scripts/login_redirect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="mainframe">
        <div class="header">
            <img src="./resources/admin.png" width="100px" height="100px">
            <input class="right headerInput" type="submit" value="submit">
            <input class="right headerInput" type="search" name="mainsearch" id="mainsearch" placeholder="Search faster">
        </div>

        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../index.php" style="float:right;">Logout</a></li>
                <li><a href="admin_myaccount.php" style="float: right;">My account</a></li>
            </ul>
        </nav> 

        <div class="sidebar">
            <h1>Database</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="admin_add.php" style="color: crimson;">Add event</a></li>
                    <li><a href="admin_update.php">Update event</a></li>
                    <li><a href="admin_delete.php">Delete event</a></li>    
                    <li><a href="admin_events.php">See events</a></li> 
                </ul>
            </div>

            <h1>Users and access</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="admin.php">Admin home page</a></li>
                    <li><a href="admin_manage.php">Manage access</a></li>
                </ul>
            </div>

            <h1>Informations about data</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="countries.php">Countries ID</a></li>
                    <li><a href="targsubtype.php">Targ subtype ID</a></li>
                </ul>
            </div>

            <h1>Articles</h1>
            <div class="leftbox">
                <ul class="sidemenu">
                    <li><a href="admin_add_article.php">Add article</a></li>
                    <li><a href="admin_update_article.php">Update article</a></li>
                    <li><a href="admin_delete_article.php">Delete article</a></li>
                    <li><a href="admin_see_articles.php">See all articles</a></li>
                </ul>
            </div>
        </div>

        <div class="main">
            <!-- This is for adding a row to DB -->
            <div class="adder"> 
                <form action="">
                    <label for="year">Year: </label><input type="text" id="year" name="year" placeholder="Example : 1970"><br><br>
                    <label for="month">Month: </label><input type="text" id="year" name="year" placeholder="Example : 5"><br><br>
                    <label for="date">Day: </label><input type="text" id="year" name="year" placeholder="Example : 10"><br><br>
                    <label for="extended">Extended: </label><input type="checkbox" name="extended" id="extended"><br><br>
                    <label for="countryID"><a href="countries.html" target="_blank">Country ID</a> </label><input type="text" name="countryID" id="countryID" placeholder="Please check list of countries IDs"><br><br>
                    <label for="country">Country: </label><input type="text" name="country" id="country" placeholder="Example: Romania"><br><br>
                    <label for="regionID">Region</label><select name="region" id="region">
                        <option value="1">North America</option>
                        <option value="2">Central America & Caribbean</option>
                        <option value="3">South America</option>
                        <option value="4">East Asia</option>
                        <option value="5">Southeast Asia</option>
                        <option value="6">South Asia</option>
                        <option value="7">Central Asia</option>
                        <option value="8">Western Europe</option>
                        <option value="9">Eastern Europe</option>
                        <option value="10">Middle East & North Africa</option>
                        <option value="11">Sub-Saharan Africa</option>
                        <option value="12">Australasia & Oceania</option>
                    </select><br><br>
                    
                    <label for="state">State: </label><input type="text" name="state" id="state"><br><br>
                    <label for="city">City: </label><input type="text" name="city" id="city"><br><br>
                    <label for="latitude">Latitude: </label><input type="text" name="latitude" id="latitude"><br><br>
                    <label for="longitude">Longitude: </label><input type="text" name="Longitude" id="Longitude"><br><br>
                    <label for="specificity">Specificity: </label><input type="text" name="specificity" id="specificity"><br><br>
                    <label for="vicinity">Vicinity: </label><input type="checkbox" name="vicinity" id="vicinity"><br><br>
                    <label for="summary">Summary: </label><textarea name="summary" id="" cols="30" rows="10"></textarea><br><br>
                    <label for="multiple">Multiple: </label><input type="checkbox" name="multiple" id="multiple"><br><br>
                    <label for="succes">Succes: </label><input type="checkbox" name="succes" id="succes"><br><br>
                    <label for="suicide">Suicide: </label><input type="checkbox" name="suicide" id="suicide"><br><br>
                    <label for="attacktype">Attack type: </label><select name="attacktype" id="attacktype">
                        <option value="1">Assasination</option>
                        <option value="2">Armed assault</option>
                        <option value="3">Bombing/Explosion</option>
                        <option value="4">Hijacking</option>
                        <option value="5">Hostage Taking (Barricade Incident)</option>
                        <option value="6">Hostage Taking (Kidnapping)</option>
                        <option value="7">Facility/Infrastructure Attack</option>
                        <option value="8">Unarmed assault</option>
                        <option value="9">Unknown</option>
                    </select><br><br>

                    <label for="targtype">Targ type: </label><select name="targtype" id="targtype">
                        <option value="1">Business</option>
                        <option value="2">Government (General)</option>
                        <option value="3">Police</option>
                        <option value="4">Military</option>
                        <option value="5">Abortion related</option>
                        <option value="6">Airport & aircraft</option>
                        <option value="7">Government (Diplomatic)</option>
                        <option value="8">Educational Institution</option>
                        <option value="9">Food or water supply</option>
                        <option value="10">Journalist & media</option>
                        <option value="11">Maritime</option>
                        <option value="12">NGO</option>
                        <option value="13">Other</option>
                        <option value="14">Private citizens & property</option>
                        <option value="15">Religious figures/institutions</option>
                        <option value="16">Telecommunication</option>
                        <option value="17">Terrorist/Non-state militia</option>
                        <option value="18">Tourists</option>
                        <option value="19">Transportation</option>
                        <option value="20">Unknown</option>
                        <option value="21">Utilities</option>
                        <option value="22">Violent political party</option>
                    </select><br><br>

                    <label for="targsubtype"><a href="#">Targ subtypes</a></label><input type="text" name="targsubtype" id="targsubtype" placeholder="Enter here the ID"><br><br>
                    <label for="corp">Corp: </label><input type="text" name="corp" id="corp"><br><br>
                    <label for="target">Target: </label><input type="text" name="target" id="target"><br><br>
                    <label for="nationality"><a href="#">Nationality:</a></label><input type="text" name="nationality" id="nationality" placeholder="Example : Romanian"><br><br>
                    <label for="gname">Organisation name: </label><input type="text" name="gname" id="gname"><br><br>
                    <label for="motive">Motive: </label><input type="text" name="motive" id="motive"><br><br>
                    <label for="claimed">Claimed: </label><input type="checkbox" name="claimed" id="claimed"><br><br>
                    <label for="wptype">Weapon type: </label><select name="wptype" id="wptype">
                        <option value="1">Biological</option>
                        <option value="2">Chemical</option>
                        <option value="3">Radiological</option>
                        <option value="5">Firearms</option>
                        <option value="6">Explosives</option>
                        <option value="7">Fake weapons</option>
                        <option value="8">Incendiary</option>
                        <option value="9">Melee</option>
                        <option value="10">Vehicle (not to include vehicle-borne explosives, i.e., car or truck bombs)</option>
                        <option value="11">Sabotage equipment</option>
                        <option value="12">Other</option>
                        <option value="13">Unknown</option>
                    </select><br><br>
                    <label for="wpsubtype">Weapon subtype: </label><input type="text" name="wpsubtype" id="wpsubtype"><br><br>
                    <label for="wpdetail">Weapon detail: </label><input type="text" name="wpdetail" id="wpdetail"><br><br>     
                    <label for="nkill">Number of kills: </label><input type="text" name="nkill" id="nkill"><br><br>
                    <label for="nkillus">Number of kills us: </label><input type="text" name="nkillus" id="nkillus"><br><br>
                    <label for="nkillter">Number of killter: </label><input type="text" name="nkillter" id="nkillter"><br><br>
                    <label for="nwounds">Number of wounds: </label><input type="text" name="nwounds" id="nwounds"><br><br>
                    <label for="nwoundsus">Number of wounds us: </label><input type="text" name="nwoundsus" id="nwoundsus"><br><br>
                    <label for="ishostkid">Is host kid: </label><input type="checkbox" name="ishostkid" id="ishostkid"><br><br>
                    <label for="notes">Add notes: </label> <textarea name="notes" id="" col s="30" rows="10"></textarea><br><br>
                    <label for="propextent">Propextent: </label><select name="propextent" id="propextent">
                        <option value="1">Catastrophic (likely >= $1 billion)</option>
                        <option value="2">Major (likely >= $1 million but < $1 billion)</option>
                        <option value="3">Minor (likely < $1 million)</option>
                        <option value="4">Unknown</option>
                    </select><br><br>
                    <input type="submit" value="Add event to database">
                </form>
            </div>
        </div>

    </div>
</body> 
</html>