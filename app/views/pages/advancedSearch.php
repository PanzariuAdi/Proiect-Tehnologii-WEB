<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/statisticsStyle.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/advancedSearchStyle.css">
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
                <input id = "submit" type ="button" value = "submit">
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
            };
            $searchItems = YAXIS;
            foreach(YAXIS as $item){
                if(!($item == "Attacks"))
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
        </div>
      </div>
        <div id = "searchWrapper">
        </div>    
      <script type = "module" src="<?php echo URL_ROOT; ?>/javascript/advancedSearch/main.js"></script>
</body> 
</html>