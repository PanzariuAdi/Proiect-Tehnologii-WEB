<nav>
    <ul>
        <li><a href="<?php echo URL_ROOT; ?>">Home</a></li>
        <li><a href="<?php echo URL_ROOT; ?>/pages/statistics">Statistics</a></li>
        <li><a href="<?php echo URL_ROOT; ?>/pages/map">Map</a></li>
        <li><a href="<?php echo URL_ROOT; ?>/pages/raport">Raport</a></li>
        <li><a href="<?php echo URL_ROOT; ?>/pages/advancedSearch">🔍</a></li>
        
        <?php session_start();
              if(!isset($_SESSION['user_id'])) :  ?>
            <li><a href="<?php echo URL_ROOT; ?>/users/login" style="float:right;">Login</a></li>
        <?php else : ?>
            <li><a href="<?php echo URL_ROOT; ?>/users/logout"; style="float: right;">Logout</a></li>    
            <li><a href="<?php echo URL_ROOT; ?>/admin/admin_myaccount"; style="float: right;">My account</a></li>
        <?php endif; ?>
    </ul>
</nav>