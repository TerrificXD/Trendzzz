<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Product Detail</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8"/>
    <meta name="keywords"
          content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
    />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <?php
    include_once 'headerfiles.html';
    ?>

</head>

<body>

<?php
@session_start();
if (isset($_SESSION["email"])) {
    include "userheader.php";
} else {
    include_once 'connection.php';
    include "publicheader.php";
}
include_once 'connection.php';
?>

<?php
//include_once 'publicheader.php';
//include_once 'connection.php';
?>

<!-- banner-2 -->
<div class="page-head_agile_info_w3l"></div>
<!-- //banner-2 -->

<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.php">Home</a>
                    <i>|</i>
                </li>
                <li>Product Detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->

<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>P</span>roduct
            <span>D</span>etail</h3>
        <!-- //tittle heading -->


        <div class="row">
            <?php
            if (isset($_REQUEST["q"])) {
                $productid = $_GET["q"];
                $sqlproduct = "select * from product where productid='$productid'";
                if (isset($_SESSION['products'])) {
                    $ar = $_SESSION['products'];
                    $flag = 0;
                    $qty = 1;
                    foreach ($ar as $item) {
                        if ($productid == $item->id) {
                            $qty = $item->qty;
                            $flag = 1;
                            break;
                        }
                    }
                }
                $resproduct = mysqli_query($conn, $sqlproduct);
                while ($product_row = mysqli_fetch_array($resproduct)) {
                    ?>
                    <div class="col-lg-5 col-md-8 single-right-left ">
                        <div class="grid images_3_of_2">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="<?php echo $product_row["photo"]; ?>">
                                        <div class="thumb-image">
                                            <img src="<?php echo $product_row["photo"]; ?>" data-imagezoom="true"
                                                 class="img-fluid"
                                                 alt=""></div>
                                    </li>

                                    <?php
                                    $sqlphoto = "select * from product_photo where productid='$productid'";
                                    $resphoto = mysqli_query($conn, $sqlphoto);
                                    while ($photo = mysqli_fetch_array($resphoto)) {
                                        ?>

                                        <li data-thumb="<?php echo $photo["photo"]; ?>">
                                            <div class="thumb-image">
                                                <img src="<?php echo $photo["photo"]; ?>" data-imagezoom="true"
                                                     class="img-fluid"
                                                     alt=""></div>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                        <h3 class="mb-3"><?php echo $product_row["productname"]; ?></h3>
                        <p class="mb-3">
                    <span class="item_price">&#8377;<?php
                        if (!empty($product_row['discount']) && $product_row['discount'] > 0) {
                            $discountedPrice = $product_row['price'] - ($product_row['price'] * $product_row['discount'] / 100);
                            echo round($discountedPrice);
                        } else {
                            echo round($product_row['price']);
                        }
                        ?>
                    </span>
                            <del class="mx-2 font-weight-light"><?php
                                if (!empty($product_row['discount']) && $product_row['discount'] > 0) {
                                    ?>
                                    <span class="price-old"><del>&#8377; <?php echo $product_row['price'] ?></del></span>
                                    <?php
                                }
                                ?>
                            </del>
                            <label>Free delivery</label>
                        </p>
                        <div class="single-infoagile">
                            <ul>
                                <li class="mb-3">
                                    Cash on Delivery Eligible.
                                </li>
                                <li class="mb-3">
                                    Shipping Speed to Delivery.
                                </li>
                                <li class="mb-3">
                                    Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C
                                </li>
                            </ul>
                        </div>
                        <div class="product-single-w3l">
                            <p class="my-3">
                                <i class="far fa-hand-point-right mr-2"></i>
                                <label>1 Year</label>Manufacturer Warranty</p>
                            <ul>
                                <li class="mb-1">
                                    <?php echo $product_row["description"]; ?>
                                </li>
                            </ul>
                            <p class="my-sm-4 my-3">
                                <i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
                            </p>
                        </div>
                        <div class="occasion-cart">
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <?php
                                if ($product_row['stock'] > 0) {
                                    ?>
                                    <button class="button btn btn-primary" type="button"
                                            onclick="addToCart(<?php echo $product_row[0] ?>,1)">Add To Cart
                                    </button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="button btn btn-danger" type="button">
                                        Out Of Stock
                                    </button>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- //Single Page -->

<?php
include_once 'footer.php';
?>
<script src="templatefiles/js/jquery-2.2.3.min.js"></script>
<!-- //jquery -->

<!-- nav smooth scroll -->
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //nav smooth scroll -->

<!-- popup modal (for location)-->
<script src="templatefiles/js/jquery.magnific-popup.js"></script>
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<!-- //popup modal (for location)-->

<!-- cart-js -->
<script src="templatefiles/js/minicart.js"></script>
<script>
    paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

    paypals.minicarts.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });
</script>
<!-- //cart-js -->

<!-- password-script -->
<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<!-- //password-script -->

<!-- imagezoom -->
<script src="templatefiles/js/imagezoom.js"></script>
<!-- //imagezoom -->

<!-- flexslider -->
<link rel="stylesheet" href="templatefiles/css/flexslider.css" type="text/css" media="screen"/>

<script src="templatefiles/js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!-- //FlexSlider-->

<!-- smoothscroll -->
<script src="templatefiles/js/SmoothScroll.min.js"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="templatefiles/js/move-top.js"></script>
<script src="templatefiles/js/easing.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */
        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->
<script src="templatefiles/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- //js-files -->
</body>

</html>
