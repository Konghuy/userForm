<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="user.css"  type="text/css">
</head>
<body>
    
    <form method="POST" action="insert.php">
        <h1 id="title" >Regiseter Form</h1>
        <?php 
            if(isset($_SESSION['errors'])){
                include "errors.php";
                unset($_SESSION['errors']);
            }
        ?>
        
        <input class="text" type="text" placeholder="First Name" name="txtFname" 
            <?php if(isset($_SESSION['Data'])){
                echo  'value = "'. $_SESSION['Data'][0] .'"';
            } ?> /> <br>

        <input class="text" type="text" placeholder="Last Name" name="txtLname" 
            <?php if(isset($_SESSION['Data'])){
                echo  'value = "'. $_SESSION['Data'][1] .'"';
            } ?>/> <br>
            
        <input class="text" type="text" placeholder="Email" name="txtEmail" 
            <?php if(isset($_SESSION['Data'])){
                echo  'value = "'. $_SESSION['Data'][2] .'"';
            } ?>/> <br>
        <input class="text" type="text" placeholder="User Name" name="txtUserName" 
            <?php if(isset($_SESSION['Data'])){
                echo  'value = "'. $_SESSION['Data'][3] .'"';
            } ?>/> <br>
        <input class="text" type="password" placeholder="Password" name="txtPwd1"
            <?php if(isset($_SESSION['Data'])){
                echo  'value = "'. $_SESSION['Data'][4] .'"';
            } ?>/> <br>
        <input class="text" type="password" placeholder="Confirm Password" name="txtPwd2"
            <?php if(isset($_SESSION['Data'])){
                echo  'value = "'. $_SESSION['Data'][5] .'"';
            } ?>/> <br>
        
        <input class="button" type="submit" value="Register">
       <?PHP unset($_SESSION['Data']); ?>
    </form>      
        
</body>
</html>
