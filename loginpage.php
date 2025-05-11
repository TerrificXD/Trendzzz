<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    include_once 'headerfiles.html';
    ?>

    <title>Admin Login</title>
</head>
<body>
<?php
//include_once 'adminheader.php';
?>
<div class="container">
    <div class="jumbotron">
        <div class="row offset-3">
            <h1 class="text-primary">Login Here</h1>
            <hr>
        </div>

        <form action="checklogin.php" method="post" id="form1">

            <div class="row col-sm-6 offset-3">
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="enter username" name="username" id="username" data-rule-required="true">
                </div>
            </div>
            <div class="row justify-content-center col-sm-6 offset-3">
                <div class="input-container">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" class="input-field" placeholder="enter password" name="password" data-rule-required="true"
                           id="password"><span><i
                            class="fa fa-eye-slash" id="eyeslash" onclick="showpassword1()"></i></span>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" value="submit" class='btn btn-success'>Log in</button>
            </div>
        </form>
    </div>
    <?php
    if (isset($_REQUEST['er'])) {
        $val = $_REQUEST['er'];
        if ($val == 1) {
            echo '<div class="alert alert-danger">
                        Password changed successfully
                        <span class="close" data-dismiss="alert">&times;</span>
                            </div>';
        }
        if ($val == 4) {
            echo '<div class="alert alert-danger">
                        Invalid User name password
                        <span class="close" data-dismiss="alert">&times;</span>
                            </div>';
        }
    }
    include_once 'adminfooter.php';
    ?>

</div>
</body>
</html>
