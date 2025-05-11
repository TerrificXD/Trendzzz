<?php
include_once "connection.php";
@session_start();
if (isset($_SESSION["adminusername"])) {
    $username = $_SESSION["adminusername"];
} else {
    header("location:loginpage.php");
}

if (isset($_POST["addadmin"])) {
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];
    $s = "select * from admin where  username='$username'";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) > 0) {
        echo 0;
    } else {
        $sql = "INSERT INTO `admin`(`username`, `email`, `password`, `mobile`, `fullname`) VALUES ('$username','$email','$password','$mobile','$fullname')";
//        echo $sql;
        mysqli_query($conn, $sql);
        echo 1;
    }

} elseif (isset($_POST["updateadmin"])) {
    $editusername = $_POST["editusername"];
    $editfullname = $_POST["editfullname"];
    $editemail = $_POST["editemail"];
    $editmobile = $_POST["editmobile"];
    $update = "UPDATE `admin` SET `email`='$editemail',`mobile`='$editmobile',`fullname`='$editfullname' WHERE username = '$editusername'";
    mysqli_query($conn, $update);

} elseif (isset($_POST["up"])) {
    $datapassword = "";
    $oldpassword = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];
    $connewpassword = $_POST["connewpassword"];
    $sql1 = "select password from admin where username='$username'";
    $result = mysqli_query($conn, $sql1);
    while ($paa = mysqli_fetch_array($result)) {
        $datapassword = $paa["password"];
    }
    if ($newpassword != $connewpassword) {
        echo 2;
    } elseif ($oldpassword != $datapassword) {
        echo 0;
    } else {
        $updatepassword = "UPDATE `admin` SET `password`='$newpassword' WHERE username = '$username'";
        mysqli_query($conn, $updatepassword);
        echo 1;
    }
} elseif (isset($_REQUEST["q"])) {
    $user = $_REQUEST["q"];
    $delete = "DELETE FROM `admin` WHERE username ='$user'";
    mysqli_query($conn, $delete);

} elseif (isset($_GET["type"])) {
    if ($_GET["type"] == "admin") {
        unset($_SESSION["username"]);
        echo "success";
    }

} else {
    $ar = array();
    $num = 0;
    $s = "select * from admin";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $ar[$num] = $row;
        $num++;
    }
    echo json_encode($ar);
}
?>