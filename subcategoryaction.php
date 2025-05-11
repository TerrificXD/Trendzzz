<?php
include_once 'connection.php';

if (isset($_POST["addsubcategory"])) {
    $subcategoryname = $_POST["subcategoryname"];
    $subcategorydescription = $_POST["subcategorydescription"];
    $category = $_POST["category"];
    $s = "select * from subcategory where subcategoryname='$subcategoryname' AND category='$category'";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) > 0) {
        echo 0;
    } else {
        $sql = "INSERT INTO `subcategory`(`subcategoryid`, `subcategoryname`, `description`, `category`) VALUES (null ,'$subcategoryname','$subcategorydescription','$category')";
//        echo $sql;
        mysqli_query($conn, $sql);
        echo 1;
    }

} elseif (isset($_POST["updatesubcategory"])) {
    $editsubcategoryid = $_POST["editsubcategoryid"];
    $editsubcategoryname = $_POST["editsubcategoryname"];
    $editsubcategorydescription = $_POST["editsubcategorydescription"];
    $editcategory = $_POST["editcategory"];
    $update = "UPDATE `subcategory` SET `subcategoryname`='$editsubcategoryname',`description`='$editsubcategorydescription',`category`='$editcategory' WHERE `subcategoryid`='$editsubcategoryid'";
    mysqli_query($conn, $update);

} elseif (isset($_REQUEST["q"])) {
    $subcatid = $_REQUEST["q"];
    $delete = "DELETE FROM `subcategory` WHERE subcategoryid ='$subcatid'";
    mysqli_query($conn, $delete);

} elseif (isset($_GET["cat"])) {
    $type = $_GET["cat"];
//    echo $type;
    $crr = array();
    $ss = "";
    $num = 0;
    if ($type != "") {
        $ss = "select * from `subcategory` where category ='$type'";
    } else {
        $ss = "select * from subcategory";
    }
    $result = mysqli_query($conn, $ss);
    while ($row = mysqli_fetch_array($result)) {
        $crr[$num] = $row;
        $num++;
    }
    echo json_encode($crr);
} else {
    $ar = array();
    $num = 0;
    $s = "select * from subcategory";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $ar[$num] = $row;
        $num++;
    }
    echo json_encode($ar);
}
