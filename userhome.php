<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Home</title>

    <?php
    include_once "headerfiles.html";
    ?>
</head>
<body>

<?php
include_once "userheader.php";
?>

<div class="container">
    <div class="jumbotron mt-5">
        <h1 class="text-center">Welcome
            <strong class="text-success text-capitalize"><?php echo $user_row['fullname']; ?></strong>
            to User panel
        </h1>
    </div>
</div>

<?php
include_once 'footer.php';
?>

</body>
</html>
