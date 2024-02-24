<?php
$servername="localhost";
$username="root";
$password="";
$db_name="ajax";
$conn= new mysqli($servername,$username,$password,$db_name);

if(!$conn){
    die("connection faild :".$conn->connect_error);
}
// else{
//     echo "succes";
// }