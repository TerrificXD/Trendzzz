<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    @session_start();

    include_once 'connection.php';
    include_once 'headerfiles.html';
    ?>
</head>
<body>
<?php
include_once 'publicheader.php';
?>
<div class="container">
    <?php
    if (isset($_POST["search"])) {
        $search = $_POST["search"];

        $sqlsearch = "select * from product where productname like '%$search%'";
        $ressearch = mysqli_query($conn, $sqlsearch);
        while ($searchrow = mysqli_fetch_array($ressearch)) {
            ?>
            <div class="col-md-3 product-men mt-5">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item text-center">
                        <img style="height: 150px;width: 150px" src="<?php echo $searchrow["photo"]; ?>" alt="">
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="productdetail.php?q=<?php echo $searchrow["productid"]; ?>"
                                   class="link-product-add-cart">Quick View</a>
                            </div>
                        </div>
                    </div>
                    <div class="item-info-product text-center border-top mt-4">
                        <h4 class="pt-1">
                            <a href="productdetail.php?q=<?php echo $searchrow["productid"]; ?>"><?php echo $searchrow["productname"]; ?></a>
                        </h4>
                        <div class="info-product-price my-2">

                                                <span class="item_price">&#8377;<?php
                                                    if (!empty($searchrow['discount']) && $searchrow['discount'] > 0) {
                                                        $discountedPrice = $searchrow['price'] - ($searchrow['price'] * $searchrow['discount'] / 100);
                                                        echo $discountedPrice;
                                                    } else {
                                                        echo $searchrow['price'];
                                                    }
                                                    ?></span>
                            <del><?php
                                if (!empty($searchrow['discount']) && $searchrow['discount'] > 0) {
                                    ?>
                                    <span class="price-old"><del>&#8377; <?php echo $searchrow['price'] ?></del></span>
                                    <?php
                                }
                                ?></del>
                        </div>
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <form action="#" method="post">
                                <fieldset>
                                    <!--                                                        <input type="hidden" name="cmd" value="_cart"/>-->
                                    <!--                                                        <input type="hidden" name="add" value="1"/>-->
                                    <!--                                                        <input type="hidden" name="business" value=" "/>-->
                                    <!--                                                        <input type="hidden" name="item_name"-->
                                    <!--                                                               value="Samsung Galaxy J7"/>-->
                                    <!--                                                        <input type="hidden" name="amount" value="200.00"/>-->
                                    <!--                                                        <input type="hidden" name="discount_amount" value="1.00"/>-->
                                    <!--                                                        <input type="hidden" name="currency_code" value="USD"/>-->
                                    <!--                                                        <input type="hidden" name="return" value=" "/>-->
                                    <!--                                                        <input type="hidden" name="cancel_return" value=" "/>-->
                                    <button class="button btn btn-primary" type="button"
                                        <?php if ($searchrow['stock'] > 0) { ?>
                                            onclick="addToCart(<?php echo $searchrow[0] ?>,1)">add to cart
                                        <?php
                                        }
                                        else {
                                            echo ">Out of Stcok";
                                        }
                                        ?>
                                    </button>
                                    <!--                                                        <input type="submit" name="submit" value="Add to cart"-->
                                    <!--                                                               class="button btn"/>-->
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

<?php
include_once 'footer.php';
?>

</body>
</html>
