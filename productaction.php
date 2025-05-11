<?php
include_once 'connection.php';

//Add-Product
if (isset($_POST["addproduct"])) {
    $productname = $_POST["productname"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $discount = $_POST["discount"];
    $description = $_POST["description"];
    $subcategory = $_POST["subcategory"];
    $photo = $_FILES["photo"]["tmp_name"];
    $photoname = $_FILES["photo"]['name'];

    if ($_FILES['photo']['size'] / 1024 > 100) {
        echo "Image must be less than 100 kb";
    } elseif (strtolower(pathinfo($photoname, PATHINFO_EXTENSION)) != "png" and strtolower(pathinfo($photoname, PATHINFO_EXTENSION)) != "jpg") {
        echo "Image type must be jpg or png format";
    } else {
        $pic = "photos/$photoname";
        move_uploaded_file($photo, $pic);
        $s = "select * from product where productname='$productname'";
        $result = mysqli_query($conn, $s);
        if (mysqli_num_rows($result) > 0) {
            echo "Product Already Exists";
        } else {
            $sql = "INSERT INTO `product`(`productid`, `productname`, `price`, `stock`, `discount`, `photo`, `description`, `subcatid`) VALUES (null ,'$productname','$price','$stock','$discount','$pic','$description','$subcategory')";
//        echo $sql;
            mysqli_query($conn, $sql);
            echo "Product Added Successfully";
        }
    }
}
//
//ADD-Product-Photo
elseif (isset($_POST["photosave"])) {
    $photo = $_FILES["pphoto"]["tmp_name"];
    $productid = $_POST["pid"];
    $caption = $_POST["caption"];
    $path = '';
    $error = '';
    if ($photo != "") {
        $filename = $_FILES["pphoto"]["name"];
        $ext = pathinfo(strtolower($filename), PATHINFO_EXTENSION);
        if (round($_FILES["pphoto"]["size"] / 1024) > 500) {
            $error = "Image size must be less than 100 kb";
            echo $error;
        } else {
            $path = "photos/$filename";
            move_uploaded_file($photo, $path);
        }
    }
    if ($error == "") {
        $s = "select * from product_photo where caption='$caption' and productid='$productid'";
        $result = mysqli_query($conn, $s);
        if (mysqli_num_rows($result) > 0) {
            echo "Caption ALready Exists";
        } else {
            $qury = "INSERT INTO `product_photo`(`id`, `photo`, `caption`, `productid`) VALUES (null ,'$path','$caption','$productid')";
//        echo $s;
            if (mysqli_query($conn, $qury)) {
                echo "Photo Added Successfully";
            } else {
                echo "Failed to add photo";
            }
        }
    } else {
        echo $error;
    }


} elseif (isset($_POST["updateproduct"])) {
    $editproductid = $_POST["editproductid"];
    $editproductname = $_POST["editproductname"];
    $editprice = $_POST["editprice"];
    $editstock = $_POST["editstock"];
    $editdiscount = $_POST["editdiscount"];
    $editdescription = $_POST["editdescription"];
//    $editsubcategory = $_POST["editsubcategory"];
    $editphoto = "";
    if (isset($_FILES["editphoto"]["tmp_name"])) {
        $editphoto = $_FILES["editphoto"]["tmp_name"];
    }
    if ($editphoto != "") {
        $editphotoname = $_FILES["editphoto"]['name'];
        if ($_FILES['editphoto']['size'] / 1024 > 100) {
            echo "Image must be less than 100 kb";
        } elseif (strtolower(pathinfo($editphotoname, PATHINFO_EXTENSION)) != "png" and strtolower(pathinfo($editphotoname, PATHINFO_EXTENSION)) != "jpg") {
            echo "Image type must be jpg or png format";
        } else {
            $editpic = "photos/$editphotoname";
            move_uploaded_file($editphoto, $editpic);
            $update = "UPDATE `product` SET `productname`='$editproductname',`price`='$editprice',`stock`='$editstock',`discount`='$editdiscount',`photo`='$editpic',`description`='$editdescription' WHERE productid ='$editproductid'";
            mysqli_query($conn, $update);
        }
        echo "update success with picture";
    } else {
        $update = "UPDATE `product` SET `productname`='$editproductname',`price`='$editprice',`stock`='$editstock',`discount`='$editdiscount',`description`='$editdescription' WHERE productid ='$editproductid'";
        mysqli_query($conn, $update);
        echo "Updated without Picture Success";
    }

} elseif
(isset($_REQUEST["q"])) {
    $productid = $_REQUEST["q"];
    $delete = "DELETE FROM `product` WHERE productid ='$productid'";
    mysqli_query($conn, $delete);
    echo "deleted Successfully";
} elseif (isset($_GET["ppp"])) {
    $id = $_GET["ppp"];
    $delete = "DELETE FROM `product_photo` WHERE id ='$id'";
    mysqli_query($conn, $delete);
    echo "Photo deleted Successfully";
} elseif
(isset($_REQUEST["subcatid"])) {
    $subcatid = $_REQUEST["subcatid"];
    $ar = array();
    $num = 0;
    $s = "SELECT product.productid,product.productname,product.price,product.stock,product.discount,product.photo,product.description,subcategory.subcategoryname,subcategory.category FROM `product` INNER JOIN subcategory ON product.subcatid=subcategory.subcategoryid where subcategory ='$subcatid'";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $ar[$num] = $row;
        $num++;
    }
    echo json_encode($ar);

} elseif
(isset($_REQUEST["category"])) {
    $ar = array();
    $categoryname = $_REQUEST["category"];
    $qury = "select subcategoryid,subcategoryname from subcategory where category='$categoryname'";
    $result = mysqli_query($conn, $qury);
    if (mysqli_num_rows($result) > 0) {
        while ($category = mysqli_fetch_assoc($result)) {
            array_push($ar, $category);
        }
        echo json_encode($ar);
    }
} elseif (isset($_GET["pp"])) {
    $pid = $_GET["pp"];
    $pr = array();
    $ss = "select product_photo.*,product.productname from product_photo inner join product on product.productid=product_photo.productid where product_photo.productid='$pid'";
    $res = mysqli_query($conn, $ss);
    if (mysqli_num_rows($res) > 0) {
        while ($photorow = mysqli_fetch_array($res)) {
            array_push($pr, $photorow);
        }
        echo json_encode($pr);
    } else {
        echo "0";
    }
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
} elseif (isset($_GET["subcat"])) {
    $subcat = $_GET["subcat"];
//    echo $type;
    $crr = array();
    $ss = "";
    $num = 0;
    if ($subcat != "") {
        $ss = "SELECT product.*,subcategory.* FROM `product` INNER JOIN subcategory ON product.subcatid=subcategory.subcategoryid where subcatid='$subcat'";
    } else {
        $ss = "SELECT product.*,subcategory.* FROM `product` INNER JOIN subcategory ON product.subcatid=subcategory.subcategoryid";
    }
    $result = mysqli_query($conn, $ss);
    while ($row = mysqli_fetch_array($result)) {
        $crr[$num] = $row;
        $num++;
    }
    echo json_encode($crr);
} else {
    $ar = array();
    $s = "SELECT product.*,subcategory.* FROM `product` INNER JOIN subcategory ON product.subcatid=subcategory.subcategoryid";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        array_push($ar, $row);
    }
    echo json_encode($ar);
}
