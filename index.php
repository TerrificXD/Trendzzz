<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Trendezz</title>

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
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item item1 active">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Get flat
                            <span>10%</span> Cashback</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
                            <span>Big</span>
                            Sale
                        </h3>
                        <a class="button2" href="index.php">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item2">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
                            <span>Collection</span>
                        </h3>
                        <a class="button2" href="index.php">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item3">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Get flat
                            <span>10%</span> Cashback</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">New
                            <span>Standard</span>
                        </h3>
                        <a class="button2" href="index.php">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item4">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Get Now
                            <span>40%</span> Discount</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Today
                            <span>Discount</span>
                        </h3>
                        <a class="button2" href="index.php">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- top Products -->
<div class="ads-grid py-sm-9 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>O</span>ur
            <span>N</span>ew
            <span>P</span>roducts</h3>
        <!-- //tittle heading -->
        <div class="row">
            <div class="agileinfo-ads-display col-lg-12">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <h3 class="heading-tittle text-center font-italic">New Products</h3>
                        <div class="row">
                            <?php
                            if (isset($_REQUEST['q'])) {
                                $subcatid = $_REQUEST['q'];
                                $product = "SELECT * FROM `product` where subcatid='$subcatid'";
                            } else {
                                $product = "SELECT * FROM `product`";
                            }
                            $product_result = mysqli_query($conn, $product);
                            if (mysqli_num_rows($product_result) > 0) {
                            while ($product_row = mysqli_fetch_array($product_result)) {
                                ?>
                                <div class="col-md-3 product-men mt-5">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img style="height: 200px;width: 160px"
                                                 src="<?php echo $product_row["photo"]; ?>" alt="">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="productdetail.php?q=<?php echo $product_row["productid"]; ?>"
                                                       class="link-product-add-cart">Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 class="pt-1">
                                                <a href="productdetail.php?q=<?php echo $product_row["productid"]; ?>">
                                                    <?php echo $product_row["productname"]; ?>
                                                </a>
                                            </h4>
                                            <div class="info-product-price my-2">
                                                <span class="item_price">&#8377;
                                                    <?php
                                                    if (!empty($product_row['discount']) && $product_row['discount'] > 0) {
                                                        $discountedPrice = $product_row['price'] - ($product_row['price'] * $product_row['discount'] / 100);
                                                        echo round($discountedPrice);
                                                    } else {
                                                        echo round($product_row['price']);
                                                    }
                                                    ?>
                                                </span>

                                                <del><?php
                                                    if (!empty($product_row['discount']) && $product_row['discount'] > 0) {
                                                        ?>
                                                        <span class="price-old"><del>&#8377; <?php echo $product_row['price'] ?></del></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </del>
                                            </div>

                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <?php
                                                        if ($product_row['stock'] > 0) {
                                                            ?>
                                                            <button class="button btn btn-primary" type="button"
                                                                    onclick="addToCart(<?php echo $product_row[0] ?>,1)">
                                                                Add To Cart
                                                            </button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button class="button btn btn-danger" type="button">
                                                                Out of Stock
                                                            </button>
                                                            <?php
                                                        }
                                                        ?>

                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="col-lg-12 mt-5">
                            <div class="text-center alert alert-danger">*No Data Found</div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //top products -->

<!-- middle section -->
<div class="join-w3l1 py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2"></div>
</div>
<!-- middle section -->

<!-- footer -->
<?php
include_once 'footer.php';
?>
<!-- //footer -->

</body>
</html>
