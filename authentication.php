<?php
// session_start();
if(!isset($_SESSION['loggedin'])){
    echo "please login";
    header("location:login.php");
    exit;
    
}

// else{
//     echo "you allready loggedin";
//     // header("location:welcome.php");
//     // exit;
// }
?>