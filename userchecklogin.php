<?php
include_once 'connection.php';
session_start();

$email = $_POST["email"];
$password = $_POST["passwordlogin"];

$qury = "SELECT * FROM `signup` WHERE email ='$email' and password = '$password'";
$result = mysqli_query($conn, $qury);
if (mysqli_num_rows($result) > 0) {
    $_SESSION["email"] = $email;
    header("location:userhome.php");
} else {
    header("location:index.php?er=1");
}
