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
    <?php include APP_ROOT . '/views/inc/navbar.php'; ?>
    <!-- <?php echo $data['country']; ?> -->
</header>   

<body>
    <div class="dropdown" id = "settingsDD">
        <button class="dropbtn" id = "settingsBTN">Settings</button>
        <div class="dropdown-content" id = "settingsContent">
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
                Filters XAXIS
            </div>

            <div class = "dropContainer">
                <select name = "firstOrLastN">
                    <option>First values</option>
                    <option>Last values</option>
                </select>   
            </div>

            <div class = "dropContainer">
                <label for = "nval"> First/Last n:</label>
                <input type = "number" id = "nval" name = "nval" value ="10">
            </div>

             <?php foreach(selectable as $item){ 

                echo '<div class  = "dropContainer">';
                echo '<div class = "dropdown" id = "'.$item.'DD">';
                echo '<button class = "dropbtn" id = "'.$item.'BTN">'.$item.'</button>';
                echo '<div class = "dropdown-content" class = "checkContent" id = "'.$item.'Content">';
                echo '<div class = "gridContent">';
                echo '<div class ="selectAll">';
                echo '<input type = "checkbox" name ="selectAll'.$item.'" id = "selectAll'.$item.'" onchange="selectAll(\''.$item.'\')">';
                echo '<label>Select all</label>';
                echo '</div>';

                $i = 0;
                $json = json_decode($data[$item],true);
                foreach($json as $opt){
                    echo '<div>
                    <input type = "checkbox" name ="'. $opt[selectableMap[$item]] .'" id="'.$item.$i.'">
                    <label>'.$opt[selectableMap[$item]].'</label>
                    </div>   ';
                    $i=$i+1;
                };
                echo '</div>    
                </div>
            </div>
            </div>';
            }?>
           
            <div class = "dropContainer">
                Filters YAXIS
            </div> 


            <?php
            foreach(YAXIS as $item){
                echo'
                <div class = "dropContainer">
                <div class = "dropdown" id = "'.$item.'DD">
                    <button class = "dropbtn" id = "'.$item.'BTN">'.$item.'</button>
                    <div class = "dropdown-content" id = "'.$item.'Content">    
                        <div class ="gridYAXIS">
                            <div>
                                <label>Lower Bound</label>
                                <input type = "checkbox" name = "'.$item.'LowerCheck" id="'.$item.'LowerCheck" onchange="lowerBoundChange(\''.$item.'\')">
                            </div>
                            <div id = "'.$item.'LowerValueDiv" class = "templateLowerValueDiv">
                                <label>value</label>
                                <input type = "number" name="AttackLowerValue" id ="AttackLowerValue" value = "0" >
                            </div>      
                            <div>
                                <label>Upper Bound</label>
                                <input type = "checkbox" name = "'.$item.'UpperCheck" id="'.$item.'UpperCheck" onchange="upperBoundChange(\''.$item.'\')">
                            </div>
                            <div id ="'.$item.'UpperValueDiv" class ="templateUpperValueDiv">
                                <label>value</label>
                                <input type = "number" name="'.$item.'UpperValue" id="'.$item.'UpperValue" value = "10" >
                            </div>

                        </div>    
                    </div>
                </div>
            </div>    
                ';
            };
            
            ?>
            
            <!-- <div class = "dropContainer">
                <div class = "dropdown" id = "'.$item.'DD">
                    <button class = "dropbtn" id = "'.$item.'BTN">'.$item.'</button>
                    <div class = "dropdown-content" id = "'.$item.'Content">    
                        <div class ="gridYAXIS">
                            <div>
                                <label>Lower Bound</label>
                                <input type = "checkbox" name = "'.$item.'LowerCheck" id="'.$item.'LowerCheck" onchange="lowerBoundChange(''.$item.'')">
                            </div>
                            <div id = "'.$item.'LowerValueDiv" class = "templateLowerValueDiv">
                                <label>value</label>
                                <input type = "number" name="AttackLowerValue" id ="AttackLowerValue" value = "0" >
                            </div>      
                            <div>
                                <label>Upper Bound</label>
                                <input type = "checkbox" name = "'.$item.'UpperCheck" id="'.$item.'UpperCheck" onchange="upperBoundChange(''.$item.'')">
                            </div>
                            <div id ="'.$item.'UpperValueDiv" class ="templateUpperValueDiv">
                                <label>value</label>
                                <input type = "number" name="'.$item.'UpperValue" id="'.$item.'UpperValue" value = "10" >
                            </div>

                        </div>    
                    </div>
                </div>
            </div>     -->

        </div>
      </div>



    <div id="test" class="container">
            <canvas id="my_Chart"></canvas>
    </div>


<script src="<?php echo URL_ROOT; ?>/javascript/statistics/script.js"></script>
</body> 
</html>