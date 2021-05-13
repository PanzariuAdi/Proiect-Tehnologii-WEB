<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/statisticsStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <title>Document</title>
</head>

<header>
    <nav>
        <ul>
            <li><a href="<?php echo URL_ROOT; ?>/pages">Home</a></li>
            <li><a href="map.html">Maps</a></li>
            <li><a href="statistics.html">Statistics</a></li>
            <li><a href="raport.html">Raport</a></li>
            <!-- <li><a href="#" style="float:right;">Logout</a></li>
            <li><a href="#" style="float: right">My account</a></li>-->
            <li><a href="login.html" style="float:right;">Login</a></li>
            <li><a href="#" id="search-button" style="float: right">Submit</a></li>
            <li><form action="" style="float: right;"><input type="text" placeholder="Search.." id="search" > </li></form>
        </ul>
    </nav>
</header>   

<body>
    <div class="dropdown">
        <button class="dropbtn">Settings</button>
        <div class="dropdown-content">

            <div class = "dropContainer">
            <select name = "graphForm" id="graphForm" onchange="updateChartType()">
                <?php foreach(CHARTS as $val) echo '<option>'.$val.'</option>';?>
            </select>
            </div>
            <div class = "dropContainer">
                <select name = "XAXISForm" id="XAXISForm">
                    <?php foreach(XAXIS as $val) echo '<option>'.$val.'</option>';?>
                </select>    
            </div>
            <div class = "dropContainer">
                <select name = "YAXISForm" id="YAXISForm">
                    <?php foreach(YAXIS as $val) echo '<option>'.$val.'</option>';?>
                </select>    
            </div>

            <div class="dropContainer">
                Filters
            </div>
            <div class = "dropContainer">
            <select id="select-meal-type" multiple="multiple">
            <option value="1">Breakfast</option>
            <option value="2">Lunch</option>
            <option value="3">Dinner</option>
            <option value="4">Snacks</option>
            <option value="5">Dessert</option>
            </select>
            </div>
            <div class = "dropContainer">
                <select name = "firstOrLastN">
                    <option>First values</option>
                    <option>Last values</option>
                </select>   
            </div>
            <form>
            <div class = "dropContainer">
                <label for = "nval"> First/Last n:</label>
                <input type = "text" id = "nval" name = "nval">
            </div>
            <div class = "dropContainer">
                <input type = "submit" value= "Submit">
            </div>
            </form>    

        </div>
      </div>



    <div id="test" class="container">
            <canvas id="my_Chart"></canvas>
    </div>


<script src="<?php echo URL_ROOT; ?>/javascript/statistics/script.js"></script>
</body> 
</html>