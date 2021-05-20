<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/login_style.css">
    <title>Document</title>
</head>

<div class="mainframe">
        <body>
        <form action="<?php echo URL_ROOT; ?>/users/register" method="POST">
            <h1>Register</h1>
            <label for="username">Username</label><br><br>
            <input type="text" name="username" placeholder="<?php echo $data['name_err']; ?>"><br><br>

            <label for="password">Password</label><br><br>
            <input type="password" name="password" placeholder="<?php echo $data['password_err']; ?>"><br><br>

            <label for="confirm_password">Confirm password</label><br><br>
            <input type="password" name="confirm_password" placeholder="<?php echo $data['confirm_password_err']; ?>"><br><br>

            <input type="submit" name="submit"> <br><br>
            <a href="<?php echo URL_ROOT; ?>/users/login">Already have an acount ? Login here</a><br><br>
            <a href="<?php echo URL_ROOT; ?>/pages">Home</a>
        </form>
    </div>
</body>
</html>