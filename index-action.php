<?php  
session_start();
error_reporting(0);

// class connection to dbMysql
require_once "class/dbClass.php";

// class getdata File
require_once "class/dataUser.php";

if($_SESSION['login'] == true){
    header('Location: home.php');
    exit();
}

// check connection
$dataUser = new dataUser();
$getUser = $dataUser->getUser();
if($getUser == "Connection failed"){
    echo "<script>alert('Connection failed')</script>";
}


if(isset($_POST['login_now'])){
    // check the input
    if(empty($_POST['username']) || empty($_POST['password'])){
        $invalid = "Incorrect username or password.";
    }else{
        // variabel input
        $usernameInput = $_POST['username'];
        $passwordInput = $_POST['password'];

        // call class dataUser
        $dataUser = new dataUser($usernameInput);

        // get data user from MySql with class dataUser
        $getUser = $dataUser->getUser();

        // check user with username
        if($getUser['nums'] > 0){
            // load data from user
            foreach($getUser['data'] as $user){
                $username = $user['username'];
                $password = $user['pass'];
            }

            // check password
            if(password_verify($passwordInput, $password)){
                // data login session
                $_SESSION['login'] = true;
                // username to session
                $_SESSION['username'] = $username;
                header('Location: home.php');
                exit();
            }else{
                $invalid = "Incorrect username or password.";
            }
        }else{
            $invalid = "Incorrect username or password.";
        }
    }
}

?>