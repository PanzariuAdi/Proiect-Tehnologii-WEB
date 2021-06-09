<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
        <script src='https://cdn.plot.ly/plotly-2.0.0.min.js'></script>
	      <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
    </head>    
  <header>
    <?php include APP_ROOT . '/views/inc/navbar.php'; ?>
  </header>  
      	<div id='myDiv'></div>
    <script type = "module" src="<?php echo URL_ROOT; ?>/javascript/maps/maps.js"></script>
</html>