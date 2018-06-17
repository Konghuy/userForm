<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <link rel="stylesheet" href="user.css"  type="text/css">
</head>
<body>
<form method="POST" action="Login.php">
        <h1 id="title" >Sign In Form</h1>
        <?php 
            if(isset($_SESSION['errors'])){
                include "errors.php";
                unset($_SESSION['errors']);
            }
        ?>
        <input class="text" type="text" placeholder="User Name" name="txtUserName"
            <?php if(isset($_GET['user'])){
                echo  'value = "'. $_GET['user'].'"';
            } ?> /> <br>
        <input class="text" type="password" placeholder="Password" name="txtPass"
            <?php if(isset($_GET['pwd'])){
                echo  'value = "'. $_GET['pwd'].'"';
            } ?> /> <br>
        <input class="button1" type="submit" formaction="/LessionWeb/userForm/RegisterForm.php" value="Register">
        <input class="button1" type="submit" value="Sign In">
</form>
</body>
</html>