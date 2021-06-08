<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/statisticsStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="<?php echo URL_ROOT; ?>/javascript/statistics/canvas2svg.js"></script>
    <title>Document</title>
</head>

<header>
    <?php include APP_ROOT . '/views/inc/navbar.php'; ?>
</header>   

<body>
    <div class="dropdown" id = "settingsDD">
        <button class="dropbtn" id = "settingsBTN">Settings</button>
        <div class="dropdown-content" id = "settingsContent">
            <div class = "dropContainer">
            <select name = "graphForm" id="graphForm">
                <?php foreach(CHARTS as $val) echo '<option>'.$val.'</option>';?>
            </select>
            </div>

            <div class = "dropContainer">
                <select name = "XAXISForm" id="XAXISForm" >
                    <?php foreach(selectable as $val) echo '<option value = "'.selectableMap[$val].'">'.$val.'</option>';?>
                </select>    
            </div>

            <div class = "dropContainer">
                <select name = "YAXISForm" id="YAXISForm">
                    <?php foreach(YAXIS as $val) echo '<option value = "'.YAXISMap[$val].'">'.$val.'</option>';?>
                </select>    
            </div>
            <div class = "dropContainer">
                <input id = "submit" type ="button" value = "submit">
            </div>    
            <div class="dropContainer">
                Filters XAXIS
            </div>

            <div class = "dropContainer">
                <select name = "firstOrLastN" id = "firstOrLastN">
                    <option>First values</option>
                    <option>Last values</option>
                </select>   
            </div>

            <div class = "dropContainer">
                <label for = "nval"> First/Last n:</label>
                <input type = "number" id = "nval" name = "nval" value ="10">
            </div>

             <?php foreach(selectable as $item){ 

                echo '<div class  = "dropContainer">
                        <div class = "dropdown" id = "'.$item.'DD">
                            <button class = "dropbtn" id = "'.$item.'BTN">'.$item.'</button>
                            <div class = "dropdown-content" class = "checkContent" id = "'.$item.'Content">
                                <div class="searchWrapper">
                                    <input
                                    type="text"
                                    name="searchBar"
                                    class="searchBar"
                                    id = search'.$item.'
                                    placeholder="search for a character"
                                    />
                                </div>
                                <div id = "searchContent'.$item.'"></div>
                                <div class = "gridContent" id = grid'.$item.'>
                                </div>    
                            </div>
                        </div>
                    </div>';
            }?>
           
            <div class = "dropContainer">
                Filters YAXIS
            </div> 
            <div class = "dropContainer">
                <label>Suicide</label>
                <select id = "suicideForm">
                    <option selected>None</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>    
            </div>    

            <div class = "dropContainer">
                <label>Extended</label>
                <select id = "extendedForm">
                    <option selected>None</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>    
            </div>    

            <div class = "dropContainer">
                <label>Ransom</label>
                <select id = "ransomForm">
                    <option>None</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>    
            </div>    

            <div class = "dropContainer">
                <label>Success</label>
                <select id = "successForm">
                    <option selected>None</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>    
            </div>    

            <?php
            foreach(YAXIS as $item){
                echo'
                <div class = "dropContainer">
                <div class = "dropdown" id = "'.str_replace(' ', '_', $item).'DD">
                    <button class = "dropbtn" id = "'.str_replace(' ', '_', $item).'BTN">'.$item.'</button>
                    <div class = "dropdown-content" id = "'.str_replace(' ', '_', $item).'Content">    
                        <div class ="gridYAXIS">
                            <div>
                                <label>Lower Bound</label>
                                <input type = "checkbox" name = "'.$item.'LowerCheck" id="'.str_replace(' ', '_', $item).'LowerCheck" >
                            </div>
                            <div id = "'.str_replace(' ', '_', $item).'LowerValueDiv" class = "templateLowerValueDiv">
                                <label>value</label>
                                <input type = "number" name="'.$item.'LowerValue" id ="'.str_replace(' ', '_', $item).'LowerValue" value = "0" >
                            </div>      
                            <div>
                                <label>Upper Bound</label>
                                <input type = "checkbox" name = "'.$item.'UpperCheck" id="'.str_replace(' ', '_', $item).'UpperCheck">
                            </div>
                            <div id ="'.str_replace(' ', '_', $item).'UpperValueDiv" class ="templateUpperValueDiv">
                                <label>value</label>
                                <input type = "number" name="'.$item.'UpperValue" id="'.str_replace(' ', '_', $item).'UpperValue" value = "10" >
                            </div>

                        </div>    
                    </div>
                </div>
            </div>    
                ';
            };
            
            ?>
            <div class = "dropContainer">
                Export
            </div>
            <div class = "dropContainer">
            <select id = "exportSelect">
                <option>CSV</option>
                <option>WebP</option>
                <option>SVG</option>
            </select>
            <input type = "button" id="export" value = "Export">
            </div>
        </div>
      </div>


    <div id="test" class="container">
            <canvas id="my_Chart"></canvas>
    </div>

<script type = "module" src="<?php echo URL_ROOT; ?>/javascript/statistics/script.js"></script>
</body> 
</html>