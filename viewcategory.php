<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Category</title>

    <?php
    include_once 'headerfiles.html';
    ?>
</head>
<body>

<?php
include_once 'adminheader.php';
?>

<div class="container">
    <div class="main-sec"></div>

    <div class="row justify-content-center">
        <h1>Manage Category</h1>
    </div>

    <div class="row justify-content-center">
        <a href="#" id="plus" class="open-button" onclick="openForm()"><i class="fa fa-5x fa-plus-square"></i></a>
    </div>
    <div class="row justify-content-center">
        <a href="#" id="minus" class="open-button" style="display: none" onclick="closeForm()"><i
                    class="fa fa-5x fa-minus-square"></i></a>
    </div>

    <div class="form-popup" id="myform">
        <form action="" class="form-container" method="post" id="addform">
            <div class="row mt-3">
                <div class="row form-group col-md-8 justify-content-center offset-2">
                    <label for="categoryname" class="font-weight-bolder"><u>Category Name</u></label>
                    <input type="text" name="categoryname" id="categoryname" data-rule-required="true"
                           data-msg-required="Category name is mandatory" placeholder="enter category name"
                           class="input-field">
                </div>
                <div class="row form-group col-md-8 justify-content-center offset-2">
                    <label for="categorydescription" class="font-weight-bolder"><u>Category Description</u></label>
                    <textarea name="categorydescription" id="categorydescription" data-rule-required="true"
                              data-msg-required="Description must be entered" class="input-field" cols="20" rows="5"
                              placeholder="enter category description "></textarea>
                </div>
                <div class="row form-group col-md-8 justify-content-center offset-2">
                    <button type="button" name="addcategory" onclick="add_category()"
                            class="btn btn-success w-25">Submit
                    </button>
                </div>

            </div>
        </form>
    </div>

    <div class="row offset-3 mt-4 col-sm-5">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="mycategory">
            <thead class="text-center">
            <tr>
                <th>Sr No.</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody id="tableforcategory"></tbody>
        </table>
    </div>
    <!-- The Modal -->
    <div class="row" id="output"></div>
    <div class="modal fade" id="myModalforcategory">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="updateform">

                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row mt-3">
                            <div class="row form-group col-md-8 justify-content-center offset-2">
                                <label for="editcategoryname" class="font-weight-bolder"><u>Category Name</u></label>
                                <input type="text" name="editcategoryname" id="editcategoryname" readonly
                                       data-rule-required="true"
                                       data-msg-required="Category name is mandatory" placeholder="enter category name"
                                       class="input-field">
                            </div>
                            <div class="row form-group col-md-8 justify-content-center offset-2">
                                <label for="editcategorydescription" class="font-weight-bolder"><u>Category
                                        Description</u></label>
                                <textarea name="editcategorydescription" id="editcategorydescription"
                                          data-rule-required="true"
                                          data-msg-required="Description must be entered" class="input-field" cols="20"
                                          rows="5"
                                          placeholder="enter category description "></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" onclick="update_category()" name="updatecategory" class="btn btn-danger">
                            Save Changes
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<script>
    <!--
    function openForm() {-->
    // <!--        document.getElementById("myform").style.display = "block";-->
    // <!--        document.getElementById("plus").style.display = "none";-->
    // <!--    }-->
    // <!---->
    // <!--    function closeForm() {-->
    // <!--        0-->
    // <!--        document.getElementById("myform").style.display = "none";-->
    // <!--        document.getElementById("plus").style.display = "block";-->
    // <!--    }-->

</script>
<?php
include_once 'adminfooter.php';
?>
<script src="datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="datatable/jquery.dataTables.css">
<script src="templatefiles/myjs/category.js"></script>
<script>
    $(document).ready(function () {
        viewcategory();
    });
</script>
</body>
</html>
<?php
