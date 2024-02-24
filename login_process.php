<?php
session_start();
$_SESSION['loggedin'] = '0';
include './db/database.php';



    $login_mail = $_POST['login_mail'];
    $login_password = $_POST['login_password'];
    
    $sql = "SELECT * FROM user WHERE email='$login_mail' ";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
  
        $hash_password = $row['password'];
    
        if (password_verify($login_password, $hash_password)) {
           
            $_SESSION['loggedin'] = '1';
            $_SESSION['name'] = $row['firstname'];
            echo "1";
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "Incorrect Email Id";
    }
    

