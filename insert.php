<?php
    session_start();
    include "connect.php";

    $fname = $_POST['txtFname'];
    $lname = $_POST['txtLname'];
    $email = $_POST['txtEmail'];
    $user = $_POST['txtUserName'];
    $pwd = $_POST['txtPwd1'];
    $pwd2 = $_POST['txtPwd2'];
    $data = array();
    //$results = array();
    $errors = array();

        if(empty($fname)){
            array_push($errors, "First Name is require.");
        }
        if(empty($lname)){
            array_push($errors, "Last Name is require.");
        }
        if(empty($email)){
            array_push($errors, "Email is require.");
        }
        if(empty($user)){
            array_push($errors, "User name is require.");
        }
        if(empty($pwd)){
            array_push($errors, "Password is require.");
        }
        if(empty($pwd2)){
            array_push($errors, "Password must be confirm.");
        }
        if($pwd != $pwd2){
            array_push($errors, "Password not match.");
        }

        $sql_compare = "SELECT * FROM tbuser WHERE user_names = '$user'";
            $results = mysqli_query($conn, $sql_compare);
            $check = mysqli_num_rows($results);
            if($check > 0){
                array_push($errors, "Dubplicate User Name.");
            }
        
        $_SESSION['errors'] = $errors;
      //  print_r($_SESSION['errors']);

        if(count($_SESSION['errors'])==0){
            $sql = "INSERT INTO tbuser (user_fname, user_lname, user_email, user_names, user_pwd)
                            VALUES ('$fname', '$lname', '$email', '$user', '$pwd')";
        
            if ($conn->query($sql) === TRUE) {
            //echo "New record has been added.";
            header("LOCATION: SignIn.php");
            }else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
                $data = array($fname, $lname, $email, $user, $pwd, $pwd2);
                $_SESSION['Data'] = $data;
            //print_r($_SESSION['Data']);
           header("LOCATION: RegisterForm.php");
        }

        
    // }else{
    //     header("LOCATION: RegisterForm.php");
    //     // include "errors.php";
    //     // header( "refresh:1;url=RegisterForm.php" );

   
?>