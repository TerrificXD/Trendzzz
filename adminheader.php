<?php
include_once 'headerfiles.html';

ob_start();
@session_start();
include_once 'connection.php';
if (isset($_SESSION["adminusername"])) {
    $username = $_SESSION["adminusername"];
} else {
    header("location:loginpage.php");
}
?>

<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-3">

            <div class="col-sm-12 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>
                    <li class="text-center border-right text-white col-sm-4">
                        <a href="#" class="text-white text-capitalize">
                            <i class="fas fa-user-circle  mr-2"></i> Welcome, <?php echo $username; ?> </a>
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="admin_changepassword.php" class="text-white">
                            <i class="fas fa-lock-open mr-2"></i> Change Password </a>
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="adminlogout.php" class="text-white">
                            <i class="fas fa-power-off mr-2"></i> Log Out </a>
                    </li>
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>
<script>
    $("#selector").autocomplete({

        source: function (request, response) {


            $.ajax({
                url: "my_server_side_resource.php",
                type: "GET",
                data: request,
                success: function (data) {
                    response($.map(data, function (el) {
                        return {
                            label: el.color,
                            value: el.value
                        };
                    }));
                }
            });
        },
        select: function (event, ui) {
            // Prevent value from being put in the input:
            this.value = ui.item.label;
            // Set the next input's value to the "value" of the item.
            $(this).next("input").val(ui.item.value);
            event.preventDefault();
        }
    });
</script>
<!-- //top-header -->

<!-- header-bottom-->
<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div class="col-md-3 logo_agile">
                <h1 class="text-center mt-2">
                    <a href="adminhome.php" class="font-weight-bold font-italic">
<!--                        <img src="templatefiles/images/mmm.png" alt=" " style="height: 75px;width: 60px" class="">-->
                        Trendezz
                    </a>
                </h1>
            </div>
            <!-- //logo -->
            <!-- header-bot -->
            <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                <div class="row">
                    <div class="navbar-inner">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <div class="agileits-navi_search">
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent"
                                        aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto text-center mr-xl-5">
                                        <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                                            <a class="nav-link" href="adminhome.php">Home
                                                <span class="sr-only">(current)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                                            <a class="nav-link" href="viewadmin.php" role="button"
                                               aria-haspopup="true" aria-expanded="false">
                                                Admin
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                                            <a class="nav-link" href="viewcategory.php" role="button" aria-expanded="false">
                                                Category
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                                            <a class="nav-link" href="viewsubcategory.php" role="button"
                                               aria-haspopup="true" aria-expanded="false">
                                                Sub Category
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                                            <a class="nav-link" href="viewproduct.php" role="button"
                                               aria-haspopup="true" aria-expanded="false">
                                                Products
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                               data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                Orders
                                            </a>
                                            <div class="dropdown-menu">
                                                <div class="agile_inner_drop_nav_info p-4">
                                                    <div class="row">
                                                        <div class="col-sm-6 multi-gd-img">
                                                            <ul class="multi-column-dropdown">
                                                                <li>
                                                                    <a href="vieworder.php">Status Wise</a>
                                                                </li>

                                                            </ul>
                                                            <a href="vieworderdatewise.php">Date Wise</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //header-bottom-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" referrerpolicy="no-referrer"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
