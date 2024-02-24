<?php
session_start();
// if(isset($_SESSION['name'])){
    // session_unset($_SESSION['name']);
    session_destroy();
    echo "<script>alert('Logout successfully');
        window.location='login.php';
    </script>";
    // header('Location: login.php');
// }
?>