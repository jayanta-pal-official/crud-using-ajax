<?php
include 'db/database.php';
$id=$_POST['id'];
$firstname=$_POST['first_name'];
$lastname=$_POST['last_name'];
$email=$_POST['email'];
$old_image = $_POST['old_image'];
$new_image=$_FILES['new_image'];
$new_image_name=$_FILES['new_image']['name'];
$edit_image="";
$chack_image=false;
if($new_image_name == ''){
    $edit_image=$old_image;
    $chack_image=true;

}else{
    $ext=pathinfo($new_image_name,PATHINFO_EXTENSION);
    if($new_image['size']>2*1024*1024){
        echo "can't accpeted more then 2mb";
        $chack_image=false;
    }elseif(!in_array($ext,['jpg','png','jgeg','svg'])){
        echo "allow image only!!!";
        $chack_image=false;
    }else{
       
        $edit_image= rand().$new_image_name;
        move_uploaded_file($new_image['tmp_name'],'upload/'.$edit_image);
        $chack_image=true;
    }

}

if($chack_image){



$sql="UPDATE user SET firstname='$firstname',lastname='$lastname',email='$email',image='$edit_image' WHERE id='$id'";
$result= $conn->query($sql);
if($result){
    echo "succesfully update";
}else{
    echo "not success";
}
}
?>