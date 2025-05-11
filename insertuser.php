<?php
include_once 'connection.php';

$msg = "";
$email = $_POST["email"];
$password = $_POST["password"];
$conpassword = $_POST["conpassword"];
$mobile = $_POST["mobile"];
$fullname = $_POST["fullname"];

if ($password == $conpassword) {
    $qury = "INSERT INTO `signup`(`email`, `password`, `fullname`, `mobile`) VALUES ('$email','$password','$fullname','$mobile')";
    if (mysqli_query($conn, $qury)) {
        echo "Insert Success";
        $msg = "success";
        header("location:index.php?response=$msg");
    } else {
        echo "Insert Failed";
        $msg = "failed";
        header("location:signup.php?response=$msg");
    }
} else {
    $msg = "notmatched";
    header("location:signup.php?response=$msg");
}
