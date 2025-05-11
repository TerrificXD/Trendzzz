<?php
session_start();

//include 'adminheader.php';
include_once 'connection.php';
$username = $_POST["username"];
$password = $_POST["password"];
$qury ="SELECT * FROM `admin` WHERE username ='$username' and password = '$password'";
$result = mysqli_query($conn,$qury);
if (mysqli_num_rows($result)>0){
    $_SESSION["adminusername"] =$username;
    header("location:adminhome.php");
}
else
{
    header("location:loginpage.php?er=4");
}