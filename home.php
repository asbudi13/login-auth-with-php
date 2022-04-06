<?php  

session_start();
error_reporting(0);
if($_SESSION['login'] == true){
    echo 'Wellcome Back '. $_SESSION['username'] .'. <br>';
    echo '<a href="logout.php"><button>Logout</button></a>';
}else{
    echo "Are you Not Login. <br><br>";
    echo '<a href="index.php"><button>Login Heret</button></a>';
}

?>