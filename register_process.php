<?php
include 'db/database.php';
$firstname = strip_tags($_POST['first_name']);
$lastname = strip_tags($_POST['last_name']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$file = $_FILES['image'];
$file_name = $_FILES['image']['name'];
$rename_image = rand() . $file_name;
$ext = pathinfo($file_name, PATHINFO_EXTENSION);
if ($file['size'] > 2 * 1024 * 1024) {
    echo "can't accpect more then 2mb";
} elseif (!in_array($ext, ['jpg', 'png', 'jpeg', 'svg'])) {
    echo "allow's image only!!";
} else {
    $duplicate_email = "SELECT email from user where email='$email'";
    $result_email = $conn->query($duplicate_email);
    $fetch = mysqli_fetch_assoc($result_email);
    if (!$fetch) {
        $hash_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO user (firstname,lastname,email,password,image) VALUES('$firstname','$lastname','$email','$hash_password','$rename_image')";
        $result = $conn->query($sql);
        if ($result) {
            move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $rename_image);
            echo "1";
        } else {
            echo "Faild!!!!";
        }
    } else {
        echo "Email id allready exist";
    }
}





























// if ($_FILES['image']['name'] != "") {
//     $file = $_FILES['image'];
//     $file_name = time() . $_FILES['image']['name'];
//     $ext = pathinfo($file_name, PATHINFO_EXTENSION);
//     if ($file['size'] > 1 * 1024 * 1024) {
//         echo "you can not select more then 1 mb";
//     } elseif (!in_array($ext, ['jpg', 'png', 'jpeg', 'svg'])) {
//         echo "please select image only";
//     } else {
//         if (move_uploaded_file($file['tmp_name'], 'uploade/' . $file_name)) {
//             $duplicate_email = "SELECT email from user where email='$email'";
//             $result_email = $conn->query($duplicate_email);
//             $fetch = mysqli_fetch_assoc($result_email);
//             if (!$fetch) {
//                 if ($password === $confirm_possword) {
//                     $valid_password = md5($confirm_possword);
//                     $sql = "INSERT INTO user (firstname,lastname,email,password,image) VALUES('$firstname','$lastname','$email','$valid_password',' $file_name ')";
//                     $result = $conn->query($sql);
//                     if ($result) {
//                         echo "<script>alert('data succesfully inserted');
//                         window.location='regester.php';</script>";
//                     } else {
//                         echo "data not inserted";
//                     }
//                 } else {
//                     echo "password can not matched";
//                 }
//             } else {
//                 echo "email id allready exist";
//             }
//         } else {
//             echo "file not uploaded";
//         }
//     }
// }
