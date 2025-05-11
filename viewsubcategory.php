<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Sub-Category</title>

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
        <h1>Manage Sub Category</h1>
    </div>

    <!-- open-Form -->
    <div class="row justify-content-center">
        <a href="#" id="plus" class="open-button" onclick="openForm()">
            <i class="fa fa-5x fa-plus-square"></i>
        </a>
    </div>

    <!-- close-Form -->
    <div class="row justify-content-center">
        <a href="#" id="minus" class="open-button" style="display: none" onclick="closeForm()">
            <i class="fa fa-5x fa-minus-square"></i>
        </a>
    </div>

    <div class="form-popup" id="myform">
        <form action="" class="form-container" method="post" id="addform">
            <div class="row mt-3">
                <div class="row form-group col-md-8 justify-content-center offset-2">
                    <label for="category" class="font-weight-bolder"><u>Category Name</u></label>
                    <select name="category" id="category" class="input-field" data-rule-required="true"
                            data-msg-required="Category must be selected">
                        <option value="">Select category</option>
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
                <div class="row form-group col-md-8 justify-content-center offset-2">
                    <label for="subcategoryname" class="font-weight-bolder"><u>Sub Category Name</u></label>
                    <input type="text" name="subcategoryname" id="subcategoryname" data-rule-required="true"
                           data-msg-required="Sub Category name is mandatory" placeholder="enter sub category name"
                           class="input-field">
                </div>
                <div class="row form-group col-md-8 justify-content-center offset-2">
                    <label for="subcategorydescription" class="font-weight-bolder"><u>Sub Category
                            Description</u></label>
                    <textarea name="subcategorydescription" id="subcategorydescription" data-rule-required="true"
                              data-msg-required="Description must be entered" class="input-field" cols="20" rows="5"
                              placeholder="enter sub category description "></textarea>
                </div>
                <div class="row form-group col-md-8 justify-content-center offset-2">
                    <button type="button" name="addsubcategory" onclick="add_subcategory()"
                            class="btn btn-success w-25">Submit
                    </button>
                </div>

            </div>
        </form>
    </div>

    <div class="row offset-3 mt-4 col-sm-5">
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

    <div class="table-responsive" id="">
        <table id="mysubcategory" class="table table-striped table-bordered">
            <thead class="text-center">
            <tr>
                <th>Sr No.</th>
                <th>Sub Category Name</th>
                <th>Sub Category Description</th>
                <th>Category</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody id="tableforsubcategory"></tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div class="row" id="output"></div>

    <div class="modal fade" id="myModalforsubcategory">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="updateform">
                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title">Edit Sub Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row form-group col-md-8 justify-content-center offset-2">
                            <label for="editcategory" class="font-weight-bolder"><u>Category Name</u></label>
                            <select name="editcategory" id="editcategory" class="input-field" data-rule-required="true"
                                    data-msg-required="Category must be selected">
                                <option value=""></option>
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
                        <div class="row form-group col-md-8 justify-content-center offset-2">
                            <label for="editsubcategoryname" class="font-weight-bolder"><u>Sub Category Name</u></label>
                            <input type="hidden" id="editsubcategoryid" name="editsubcategoryid">
                            <input type="text" name="editsubcategoryname" id="editsubcategoryname"
                                   data-rule-required="true"
                                   value=""
                                   data-msg-required="Sub Category name is mandatory"
                                   placeholder="enter sub category name"
                                   class="input-field">
                        </div>
                        <div class="row form-group col-md-8 justify-content-center offset-2">
                            <label for="editsubcategorydescription" class="font-weight-bolder"><u>Sub Category
                                    Description</u></label>
                            <textarea name="editsubcategorydescription" id="editsubcategorydescription"
                                      data-rule-required="true"
                                      data-msg-required="Description must be entered" class="input-field" cols="20"
                                      rows="5"
                                      placeholder="enter sub category description "></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" onclick="update_subcategory()" name="updatesubcategory"
                                class="btn btn-danger">Save
                            Changes
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<?php
include_once 'adminfooter.php';
?>

<script>
    $(document).ready(function () {
        viewsubcategory();
    });
</script>

<script src="datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="datatable/jquery.dataTables.css">
<script src="templatefiles/myjs/subcategory.js"></script>

</body>
</html>
