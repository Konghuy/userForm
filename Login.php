<?php 
    session_start();
    include "connect.php";
    $user = $_POST["txtUserName"];
    $pwd = $_POST["txtPass"];
    $errors = array();

    if($user == "" || $pwd == ""){
        $errors = "Please input Email or Password";
        $_SESSION['errors'] = $errors;
        header("LOCATION: SignIn.php?user=$user&pwpd=$wd");
        exit();
    }
    else{

        $sql = "SELECT user_names, user_pwd FROM tbuser WHERE user_names = '$user'";
        $results = mysqli_query($conn, $sql);
        $userinfo = array();

        if(!$results){
            $errors = "Could not successfully run query form Db"; 
            $_SESSION['errors'] = $errors;
            header("LOCATION: SignIn.php?user=$user&pwd=$pwd");
            exit();
        }
        
        if (mysqli_num_rows($results) == 0) {
            $errors = "Name not register. Please Rigister First.";
            $_SESSION['errors'] = $errors;
            header("LOCATION: SignIn.php?user=$user&pwd=$pwd");
            exit();
        }
        
        while($row_user = mysqli_fetch_assoc($results)){
                $userinfo[] = $row_user;
            }
            
            // //print_r($userinfo);
            // echo $userinfo[0]['user_names'];
            // echo $userinfo[0]['user_pwd'];
                if(
                    $userinfo[0]['user_names'] == $user &&
                    $userinfo[0]['user_pwd'] == $pwd
                ){
                    header("LOCATION: index.php");
                    $_SESSION['user']= $user;
                   // echo $_SESSION['user'];
                }else {
                    $errors = "Invalide User name and Password";
                    header("LOCATION: SignIn.php?user=$user&pwd=$pwd");
                }

            }
        //continue;
        $_SESSION['errors'] = $errors;

    //mysql_free_result($results);
?>