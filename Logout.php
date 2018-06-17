<?php 
   session_start();
    unset($_SESSION['user']);
    header("LOCATION: SignIn.php")
?>