<?php
include_once 'connection.php';
include_once 'headerfiles.html';
?>

<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top text-left">
                <a class="text-white" href="loginpage.php">Admin</a>
            </div>
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>
                    <li class="text-center border-right text-white">
                        <i class="fas fa-phone mr-2"></i> 001 234 5678
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="#" data-toggle="modal" data-target="#login" class="text-white">
                            <i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
                    </li>
                    <li class="text-center text-white">
                        <a href="#" data-toggle="modal" data-target="#signup" class="text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i>Register </a>
                    </li>
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>
<!-- //top-header -->

<!-- header-bottom-->
<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div class="col-md-3 logo_agile">
                <h1 class="text-center">
                    <a href="index.php" class="font-weight-bold font-italic">
                        Trendezz
                        <!--                        <img src="templatefiles/images/logo2.png" alt=" " class="img-fluid">&nbsp;Trendezz-->
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
                                <i class="fas fa-2x fa-cart-arrow-down"
                                   style="color: #588c7e"></i>
                                <!--                                <span id="cartCount">0</span>-->
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

<!-- MODALS -->
<!-- login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="userchecklogin.php" method="post" id="form2">
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder=" " id="email" name="email"
                               data-rule-required="true" data-msg-required="Fields must be filled">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label d-block">Password</label>
                        <input type="password" class="form-control-1" placeholder=" " id="passwordlogin"
                               name="passwordlogin"
                               data-rule-required="true" data-msg-required="Fields must be filled">
                        <span class="fa-style"><i class="fa fa-eye-slash" id="eyeslash"
                                                  onclick="showpassword1()"></i></span>
                    </div>
                    <div class="right-w3l text-center">
                        <button type="submit" class="btn btn-success" value="Log in">Log in</button>
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                        </div>
                    </div>
                    <p class="text-center dont-do mt-3">Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#signup">
                            Register Now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- register -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="insertuser.php" method="post" id="form1">
                    <div class="form-group">
                        <label class="col-form-label required">Your Name</label>
                        <input type="text" class="form-control" placeholder=" " name="fullname" id="fullname"
                               data-rule-required="true" data-msg-required="All Fields are mandatory">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label required">Email</label>
                        <input type="email" class="form-control" placeholder=" " name="email" data-rule-required="true"
                               data-msg-required="All Fields are mandatory">
                    </div>
                    <div class="form-group input-group-append">
                        <label class="col-form-label required">Password</label>
                        <input type="password" class="form-control" placeholder=" " name="password" id="password"
                               data-rule-required="true" data-msg-required="All Fields are mandatory">
                        <span class="input-group-append"><i class="fa fa-eye-slash" id="eyeslash"
                                                            onclick="showpassword()"></i></span>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label required">Confirm Password</label>
                        <input type="password" class="form-control" placeholder=" " data-rule-equalto="#password"
                               data-msg-equalto="Password and confirm password must be same" name="conpassword"
                               id="conpassword" data-rule-required="true" data-msg-required="All Fields are mandatory">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label required">Mobile</label>
                        <input type="tel" maxlength="10" minlength="10" class="form-control" placeholder=" "
                               name="mobile" id="mobile" data-rule-required="true"
                               data-msg-required="All Fields are mandatory">
                    </div>
                    <div class="right-w3l text-center">
                        <button type="submit" class="btn btn-success" value="Register">Register</button>
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                            <label class="custom-control-label" for="customControlAutosizing2">
                                I Accept to the Terms & Conditions
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //MODALS -->

<?php
if (isset($_GET['response'])) {
    if ($_GET['response'] == "success") {
        ?>
        <script>
            alert("Signup success.");
        </script>
        <?php
    }
    if ($_GET['response'] == "failed") {
        ?>
        <script>
            alert("Signup failed.");
        </script>
        <?php
    }
    if ($_GET['response'] == "notmatched") {
        ?>
        <script>
            alert("Password and Confirm password must be same.");
        </script>
        <?php
    }
}
?>
