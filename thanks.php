<?php
include "cart.php";
@session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <title>Thankyou</title>
    <?php
    include "headerfiles.html";
    ?>
</head>
<body>
<!-- banner -->
<?php
if (!isset($_SESSION["email"])) {
    include "publicheader.php";
    $email = "";
} else {
    include "userheader.php";
}

?>
<!-- //banner -->
<div class="container">
    <div class="w3ls-heading text-center py-3 text-success">
        <h3>Thanks <i class="far fa-check-circle"></i></h3>
    </div>

</div>
<div class="bhoechie-tab-content">
    <div class="container">
        <div class="jumbotron text-center">
            Thank you for Shopping with us. <br> Your Booking ID is <span class="text-danger"><?php echo $_REQUEST['q']; ?></span>
        </div>
    </div>

</div>
<?php
include "footer.php"
?>
</body>
<!-- //Body -->
</html>
