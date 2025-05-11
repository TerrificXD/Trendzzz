<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Admin</title>
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
        <h1>Manage Admins</h1>
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

                <div class="col-sm-5 offset-1 mr-3">

                    <div class="row">
                        <div class="input-container">
                            <i class="icon fa fa-envelope-square"></i>
                            <input type="email" name="email" id="email" placeholder="enter your email address"
                                   data-rule-required="true" data-msg-required="Please enter a valid email address"
                                   class="input-field">
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-container">
                            <i class="icon fa fa-user"></i>
                            <input type="text" name="username" id="username"
                                   placeholder="enter username"
                                   data-rule-required="true" data-msg-required="Please enter an unique username"
                                   class="input-field">
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-container">
                            <i class="icon fa fa-phone-alt"></i>
                            <input type="number" name="mobile" id="mobile"
                                   placeholder="enter a valid mobile number"
                                   data-rule-required="true" data-msg-required="Please enter a valid mobile number"
                                   class="input-field" minlength="10" maxlength="12">
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 ml-3">
                    <div class="row">
                        <div class="input-container">
                            <i class="icon fa fa-user-circle"></i>
                            <input type="text" name="fullname" id="fullname"
                                   placeholder="enter your name"
                                   data-rule-required="true" data-msg-required="Please enter name"
                                   class="input-field">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <i class="icon fa fa-user-lock"></i>
                            <input type="password" name="password" id="password"
                                   placeholder="enter secure password"
                                   data-rule-required="true" data-msg-required="Please enter password"
                                   class="input-field"><span><i
                                        class="fa fa-eye-slash" id="eyeslash" onclick="showpassword()"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <i class="icon fa fa-user-lock"></i>
                            <input type="password" name="conpassword" id="conpassword"
                                   placeholder="enter confirm password"
                                   data-rule-required="true" data-msg-required="Please enter confirm password"
                                   data-rule-equalto="#password"
                                   data-msg-equalto="Password and confirm password must be same"
                                   class="input-field">
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="input-container justify-content-center">
                    <button type="button" name="addadmin" onclick="add_admin()"
                            class="btn btn-success w-25">Submit
                    </button>
                </div>
            </div>

        </form>


    </div>

    <div class="table-responsive">
        <table id="myadmin" class="table table-bordered table-striped tablemera">
            <thead>
            <tr>
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Email_id</th>
                <th>Mobile</th>
                <th>Fullname</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody id="tableforadmin"></tbody>
        </table>
    </div>
    <!-- The Modal -->
    <div class="row" id="output"></div>
    <div class="modal fade" id="myModalforadmin">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="updateform">

                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title">Edit Admin</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row mt-3">

                            <div class="col-sm-8 offset-2 mr-3">
                                <div class="row">
                                    <div class="input-container">
                                        <i class="icon fa fa-envelope-square"></i>
                                        <input type="email" value="" name="editemail" id="editemail"
                                               placeholder="enter your email address"
                                               data-rule-required="true"
                                               data-msg-required="Please enter a valid email address"
                                               class="input-field">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-container">
                                        <i class="icon fa fa-user"></i>
                                        <input type="text" name="editusername" id="editusername"
                                               placeholder="enter username" readonly
                                               data-rule-required="true"
                                               data-msg-required="Please enter an unique username"
                                               class="input-field" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-container">
                                        <i class="icon fa fa-phone-alt"></i>
                                        <input type="tel" name="editmobile" id="editmobile"
                                               placeholder="enter a valid mobile number"
                                               data-rule-required="true"
                                               data-msg-required="Please enter a valid mobile number"
                                               class="input-field" minlength="10" maxlength="10"
                                               value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-container">
                                        <i class="icon fa fa-user-circle"></i>
                                        <input type="text" name="editfullname" id="editfullname"
                                               placeholder="enter your name"
                                               data-rule-required="true" data-msg-required="Please enter name"
                                               class="input-field" value="">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" onclick="update_admin()" name="updateadmin" class="btn btn-danger">Save
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
<script src="templatefiles/myjs/admin.js"></script>
<script>
    $(document).ready(function () {
        viewadmin();
    });
</script>
</body>
</html>
<?php
