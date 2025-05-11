<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Products</title>

    <?php
    ob_start();
    include_once 'headerfiles.html';
    ?>

    <script>
        function readandpreview(fileobj, imageid) {
            var firstfile = fileobj.files[0];
            var reader = new FileReader();
            reader.onload = (function (f) {
                return function read(e) {
                    document.getElementById(imageid).src = e.target.result;
                }
            })(firstfile);
            reader.readAsDataURL(firstfile);
        }

        function readandpreview2(fileobj, imageid) {
            var firstfile = fileobj.files[0];
            var reader = new FileReader();
            reader.onload = (function (f) {
                return function read(e) {
                    document.getElementById(imageid).src = e.target.result;
                }
            })(firstfile);
            reader.readAsDataURL(firstfile);
        }
    </script>
</head>
<body>

<?php
include_once 'adminheader.php';
?>

<div class="container">
    <div class="main-sec"></div>

    <div class="row justify-content-center">
        <h1>Manage Product</h1>
    </div>

    <div class="row justify-content-center">
        <a href="#" id="plus" class="open-button" onclick="openForm()">
            <i class="fa fa-5x fa-plus-square"></i>
        </a>
    </div>

    <div class="row justify-content-center">
        <a href="#" id="minus" class="open-button" style="display: none" onclick="closeForm()">
            <i class="fa fa-5x fa-minus-square"></i>
        </a>
    </div>

    <div class="form-popup" id="myform">
        <!--        <form action="" class="form-container" method="post" id="addform">-->
        <!--            <div class="row mt-3">-->
        <!--                <div class="row input-container">-->
        <!--                    <div class="col-sm-6">-->
        <!--                        <div class="row">-->
        <!--                            <div class="col-sm-4">-->
        <!--                                <label for="category" class="">Category</label>-->
        <!---->
        <!--                            </div>-->
        <!--                            <div class="col-sm-8">-->
        <!--                                <select autofocus name="category" data-rule-required="true" class="input-field"-->
        <!--                                        id="category"-->
        <!--                                        onchange="showsubcat(this.value)">-->
        <!--                                    <option value="">Select Category</option>-->
        <!--                                    --><?php
        //                                    $qury = "select categoryname from category";
        //                                    $res = mysqli_query($conn, $qury);
        //                                    while ($category = mysqli_fetch_assoc($res)) {
        //                                        ?>
        <!--                                        <option value="-->
        <?php //echo $category["categoryname"]; ?><!--">--><?php //echo $category["categoryname"]; ?><!--</option>-->
        <!--                                        --><?php
        //                                    }
        //                                    ?>
        <!--                                </select>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!---->

        <form id="addform" method="post" enctype="multipart/form-data">
            <div class="row text-primary justify-content-center mb-4 mt-3">
                <h1>Add Product</h1>
            </div>

            <div class="row form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="category" class="">Category</label>
                            <select data-rule-required="true" name="category" class="input-field" id="category"
                                    onchange="showsubcat(this.value)">
                                <option value="">Select Category</option>
                                <?php
                                $qury = "select categoryname from category";
                                $res = mysqli_query($conn, $qury);
                                while ($category = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <option value="<?php echo $category["categoryname"]; ?>"><?php echo $category["categoryname"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subcategory" class="">Sub Category</label>
                            <select name="subcategory" data-rule-required="true" class="input-field" id="subcategory">
                                <option value="">Select Sub Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <img style="height: 200px;width: 200px;border-top-style: dotted;border-bottom-style: dotted;border-left-style:dotted;border-right-style: dotted"
                             src="" id="showimg" alt="">
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="photo">Cover Photo</label>
                            <input type="file" onchange="readandpreview(this,'showimg')" class="input-field"
                                   name="photo"
                                   id="photo" data-rule-required="true"
                                   data-rule-extension="jpg|png|gif">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input data-rule-required="true" type="number" class="input-field" name="stock"
                                   placeholder="Enter Stock"
                                   id="stock">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group"></div>

            <div class="row form-group">
                <div class="col-sm-6">
                    <label for="productname" class="">Product Name</label>
                    <input data-rule-required="true" type="text" class="input-field" placeholder="product name"
                           name="productname" id="productname">
                </div>
                <div class="col-sm-3">
                    <label for="price">Price</label>
                    <input data-rule-required="true" type="number" class="input-field" placeholder="Enter Price"
                           name="price" id="price">
                </div>
                <div class="col-sm-3">
                    <label for="discount">Discount (in %)</label>
                    <input data-rule-required="true" type="number" class="input-field" placeholder="enter Discount"
                           name="discount" id="discount">
                </div>
            </div>
            <div class="row form-group">
                <label for="description" class="">Description</label>
                <textarea data-rule-required="true" name="description" placeholder="enter description" id="description"
                          class="input-field" rows="5"></textarea>
            </div>
            <div class="row input-container justify-content-around">
                <button type="button" name="addproduct" onclick="add_product()" class="btn btn-success w-25">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <div class="row display-4 text-danger" id="output"></div>

    <div class="row mb-2">
        <div class="offset-2 mt-4 col-sm-3">
            <h4>Select Category</h4>
            <select name="categoryname" id="categoryname" class="input-field" data-rule-required="true"
                    data-msg-required="Category must be selected" onchange="filtersubcategory(this.value)">
                <option value="">Select Type</option>
                <?php
                $qury1 = "select categoryname from category";
                $result = mysqli_query($conn, $qury1);
                while ($categoryname = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $categoryname["categoryname"]; ?>"><?php echo $categoryname["categoryname"]; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="offset-2 mt-4 col-sm-3">
            <h4>Select Sub Category</h4>
            <select name="subcategoryname" id="subcategoryname" class="input-field" data-rule-required="true"
                    data-msg-required="Category must be selected" onchange="filterproduct(this.value)">
                <option value="">Select Type</option>
                <?php
                $qury1 = "select subcategoryid,subcategoryname from subcategory";
                $result = mysqli_query($conn, $qury1);
                while ($categoryname = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $categoryname["subcategoryid"]; ?>"><?php echo $categoryname["subcategoryname"]; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="table-responsive" id="">
        <table id="myproduct" class="table tablemera table-bordered">
            <thead class="text-center">
            <tr style="font-size: 14px">
                <th>Sr&nbsp;No.</th>
                <th>Product&nbsp;Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Discount</th>
                <th>Photo</th>
                <th>SubCategory</th>
                <th>Category</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Add&nbsp;Pics</th>
                <th>View&nbsp;Pics</th>
            </tr>
            </thead>
            <tbody id="tableforproduct"></tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModalforproduct">
        <div class="modal-dialog modal-lg modal-md modal-sm">
            <div class="modal-content">
                <form action="" method="post" id="updateform">
                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center">
                        <div class="row">
                            <div class="col-sm-8 display-4">Edit Product</div>
                            <div class="col-sm-4">
                                <img src="" id="editphotoimg" style="height: 300px;width: 300px" alt="">
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row input-container">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="editcategory" class="">Category</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="input-field" name="editcategory"
                                               id="editcategory">
                                        <!--                                        <select name="editcategory" class="input-field" id="editcategory"-->
                                        <!--                                                onchange="showsubcat(this.value)">-->
                                        <!--                                            <option value="">--Choose Category--</option>-->
                                        <!--                                            --><?php
                                        //                                            $catvalue="";
                                        //                                            $qury = "select categoryname from category";
                                        //                                            $res = mysqli_query($conn, $qury);
                                        //                                            while ($category = mysqli_fetch_assoc($res)) {
                                        //                                                $catvalue=$category["categoryname"];
                                        //                                                ?>
                                        <!--                                                <option value="-->
                                        <?php //echo $category["categoryname"]; ?><!--">-->
                                        <?php //echo $category["categoryname"]; ?><!--</option>-->
                                        <!--                                                --><?php
                                        //                                            }
                                        //                                            ?>
                                        <!--                                        </select>-->
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6" id="">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="editsubcategory" class="">Sub Category</label>

                                    </div>
                                    <div class="col-sm-8" id="subcategory">
                                        <input type="hidden" readonly id="editsubcategoryid" name="editsubcategoryid">
                                        <input type="text" readonly class="input-field" id="editsubcategoryname"
                                               name="editsubcategoryname">
                                        <!--                                        <select name="editsubcategory" class="input-field" id="editsubcategory">-->
                                        <!--                                            <option value="">Select Sub Category</option>-->
                                        <!--                                           --><?php
                                        ////                                            $qury = "select * from subcategory where '$catvalue'";
                                        ////                                            $res2 = mysqli_query($conn, $qury);
                                        ////                                            while ($subcategory = mysqli_fetch_assoc($res2)) {
                                        ////                                                ?>
                                        <!--                                               <option value="-->
                                        <?php ////echo $subcategory["subcategoryid"]; ?><!--">-->
                                        <?php ////echo $subcategory["subcategoryname"]; ?><!--</option>-->
                                        <!--                                               --><?php
                                        ////                                            }
                                        ////                                            ?>
                                        <!--                                        </select>-->
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row input-container">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="editproductname" class="">Product Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="hidden" class="input-field" name="editproductid"
                                               id="editproductid">
                                        <input type="text" class="input-field" name="editproductname"
                                               id="editproductname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="editphoto">Photo</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" onchange="readandpreview(this,'editphotoimg')"
                                               class="input-field" name="editphoto" id="editphoto"
                                               data-rule-extension="jpg|png|gif">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row input-container">
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="editprice" class="">Price</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="tel" class="input-field" name="editprice" id="editprice">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="editdiscount">Discount</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="tel" class="input-field" name="editdiscount"
                                                       placeholder="in %"
                                                       id="editdiscount">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="editstock">Stock</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="number" class="input-field" name="editstock"
                                                       id="editstock">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row input-container">
                            <div class="col-sm-2">
                                <label for="editdescription" class="">Description</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea name="editdescription" id="editdescription" class="input-field" cols="50"
                                          rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" onclick="update_product()" name="updateproduct"
                                class="btn btn-danger">Save
                            Changes
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal" id="myModalforphoto">
        <div class="modal-dialog modal-lg modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Product Photo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" id="addphoto">
                        <div class="row input-container">
                            <div class="col-sm-5">
                                <label for="preview">Preview</label>
                            </div>
                            <div class="col-sm-5 ml-5">
                                <img src="" id="preview" style="width: 300px;height: 300px" alt="">
                            </div>
                        </div>
                        <div class="row input-container">
                            <div class="col-sm-5">
                                <label for="pphoto">Photo</label>
                            </div>
                            <div class="col-sm-5 ml-5">
                                <input type="file" onchange="readandpreview(this,'preview')"
                                       data-rule-extension="jpg|png|gif" class="input-field"
                                       data-rule-required="true" name="pphoto" id="pphoto">
                            </div>
                        </div>
                        <div class="row input-container">
                            <div class="col-sm-5">
                                <label for="caption">Caption</label>
                            </div>
                            <div class="col-sm-5 ml-5">
                                <input type="hidden" name="pid" id="pid" readonly>
                                <input type="text" class="input-field" data-rule-required="true" name="caption"
                                       id="caption">
                            </div>

                        </div>
                        <div class="row input-container">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-5 ml-5">
                                <button type="button" onclick="savephoto()" name="photosave"
                                        class="btn btn-primary">Save Photo
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal" id="myModalforphototable">
        <div class="modal-dialog modal-lg modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">View Product Photo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="max-height: 500px;overflow: auto">
                    <table class="table table-striped table-bordered" id="myproductphoto">
                        <thead class="text-center">
                        <tr>
                            <th>Sr no.</th>
                            <th>Product Name</th>
                            <th>Photo</th>
                            <th>Delete Pic.</th>
                        </tr>
                        </thead>
                        <tbody id="tableforphoto">
                        </tbody>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</div>

<?php include_once 'adminfooter.php'; ?>

<script src="datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="datatable/jquery.dataTables.css">
<script src="templatefiles/myjs/product.js"></script>
<script>
    $(document).ready(function () {
        viewproduct();
    });
</script>

</body>
</html>
