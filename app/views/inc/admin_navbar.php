<?php 
    session_start();
    if(!isset($_SESSION['user_id']))
        redirect('pages');
?>

<nav>
    <ul>
        <li><a href="<?php echo URL_ROOT; ?>">Home</a></li>
        <li><a href="<?php echo URL_ROOT; ?>/users/logout"  style="float:right;">Logout</a></li>
        <li><a href="<?php echo URL_ROOT; ?>/admin/admin_myaccount" style="float: right;">My account</a></li>
    </ul>
</nav>