<?php
include_once 'connection.php';
if (isset($_POST["addcategory"])) {
    $categoryname = $_POST["categoryname"];
    $description = $_POST["categorydescription"];
    $s = "select * from category where  categoryname='$categoryname'";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) > 0) {
        echo 0;
    } else {
        $sql = "INSERT INTO `category`(`categoryname`, `categorydescription`) VALUES ('$categoryname','$description')";
//        echo $sql;
        mysqli_query($conn, $sql);
        echo 1;
    }

} elseif (isset($_POST["updatecategory"])) {
    $editcategoryname = $_POST["editcategoryname"];
    $editcategorydescription = $_POST["editcategorydescription"];
    $update = "UPDATE `category` SET `categorydescription`='$editcategorydescription' WHERE categoryname ='$editcategoryname'";
    mysqli_query($conn, $update);

} elseif (isset($_REQUEST["q"])) {
    $name = $_REQUEST["q"];
    $delete = "DELETE FROM `category` WHERE categoryname ='$name'";
    mysqli_query($conn, $delete);

} else {
    $ar = array();
    $num = 0;
    $s = "select * from category";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $ar[$num] = $row;
        $num++;
    }
    echo json_encode($ar);
}
