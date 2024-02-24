<?php
include 'db/database.php';
$id=$_POST['id'];

$sql= "DELETE FROM user WHERE id='$id'";
$result = $conn->query($sql);
if($result){
    echo "1";
}else{
    echo "0";
}


?>