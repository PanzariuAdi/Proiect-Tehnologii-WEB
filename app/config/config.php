<?php

    // Database Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'terrorism');

    // app root
    define('APP_ROOT', dirname(dirname(__FILE__)));
    // C:/Users/panza/Desktop/Facultate/WEB/XAMPP/htdocs/proiect-mvc/app

    // url root
    define('URL_ROOT', 'http://localhost/proiect-mvc');

    // site name
    define('SITE_NAME', 'TerrorismVisualiser');
    
    define('CHARTS', array('doughnut','bar','radar','pie','line'));

    define('XAXIS', array('Country','Region','State','City','Attack Type','Target Type','Target Natality','Gang','Motive','Weapon Type','Weapon Subtype','Loss Extent','Year','Month'));

    define('YAXIS', array('Attacks','Casualities','Successful attacks','Failed attacks','Suicides','Wounded','Loss value','Ransom','Ransom Ammount','Extended(more or less than 24 hours)','Not Extended(less than 24 hours)','Terrorists'));

    

?>