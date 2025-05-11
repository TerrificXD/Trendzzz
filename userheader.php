<?php
ob_start();
include_once "connection.php";
@session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

    $user = "select * from signup where email='$email'";
    $user_result = mysqli_query($conn, $user);
    $user_row = mysqli_fetch_array($user_result);
} else {
    header("location:index.php");
}
?>

<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-2 header-most-top">
                <!--                <ul>-->
                <!--                    <li class="text-left text-white">-->
                <!--                        <i class="fas fa-phone-alt mr-2"></i>9855477484-->
                <!--                    </li>-->
                <!--                </ul>-->
            </div>
            <div class="col-lg-10 header-right text-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>

                    <li class="text-center border-right text-white">
                        <a href="userhome.php" class="text-white">
                            <i class="fas fa-user-circle  mr-2"></i> Welcome, <?php echo $email; ?>  </a>
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="myorder.php" class="text-white">My Orders</a>
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="userchangepassword.php" class="text-white">
                            <i class="fas fa-lock-open mr-2"></i>Change Password </a>
                    </li>
                    <li class="text-center text-white">
                        <a href="userlogout.php" class="text-white">
                            <i class="fas fa-power-off mr-2"></i>Logout </a>
                    </li>
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>
<!-- //top-header -->

<!-- header-bottom -->
<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div class="col-md-3 logo_agile">
                <h1 class="text-center">
                    <a href="index.php" class="font-weight-bold font-italic">
                        <img src="templatefiles/images/logo2.png" alt=" " class="img-fluid">Trendezz
                    </a>
                </h1>
            </div>
            <!-- //logo -->
            <!-- header-bot -->
            <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                <div class="row">
                    <!-- search -->
                    <div class="col-10 agileits_search">
                        <form class="form-inline" action="searchaction.php" method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search"
                                   id="search" aria-label="Search"
                                   required>
                            <button class="btn my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- //search -->
                    <!-- cart details -->
                    <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">

                            <a href="checkout.php" class="btn w3view-cart">
                                <i class="fas fa-2x fa-cart-arrow-down" style="color: #f45c5d"></i>
                                <!--                                <span id="cartCount"></span>-->
                            </a>

                        </div>
                    </div>
                    <!-- //cart details -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //header-bottom -->

<!-- navigation -->
<div class="navbar-inner">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav">

                    <?php
                    $sqlcat = "SELECT * FROM `category` limit 0,9";
                    $res = mysqli_query($conn, $sqlcat);
                    while ($category = mysqli_fetch_assoc($res)) {
                        ?>
                        <li class="nav-item dropdown mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <?php echo str_replace(" and ", "&", $category['categoryname']); ?>
                            </a>
                            <div class="dropdown-menu">
                                <div class="agile_inner_drop_nav_info">
                                    <h6 class="mb-1 font-weight-bold text-center"><?php echo $category["categoryname"]; ?></h6>
                                    <div class="row">
                                        <div class="col-sm-10 justify-content-center ml-5 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                $sqlsub = "SELECT * FROM `subcategory` where category='" . $category['categoryname'] . "'";
                                                $ressub = mysqli_query($conn, $sqlsub);
                                                while ($subcategory = mysqli_fetch_assoc($ressub)) {
                                                    ?>
                                                    <li>
                                                        <a href="index.php?q=<?php echo $subcategory['subcategoryid']; ?>"><?php echo $subcategory['subcategoryname']; ?></a>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <?php
                    }
                    ?>


                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- //navigation -->

<!-- MODAL -->
<!-- log in -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder=" " name="Name" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder=" " name="Password" required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" value="Log in">
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                        </div>
                    </div>
                    <p class="text-center dont-do mt-3">Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#exampleModal2">
                            Register Now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- register -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Your Name</label>
                        <input type="text" class="form-control" placeholder=" " name="Name" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder=" " name="Email" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder=" " name="Password" id="password1"
                               required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder=" " name="Confirm Password"
                               id="password2" required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" value="Register">
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                            <label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms &
                                Conditions</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //MODAL -->

<style>
    .header-right ul li {
        padding: 8px 0;
    }
</style>
