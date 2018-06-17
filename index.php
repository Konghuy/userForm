<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("LOCATION: SignIn.php");
        exit();
    }
?>
<body>
    <h1>Home Page</h1>
    <a href="logout.php">Log Out</a>
</body>
